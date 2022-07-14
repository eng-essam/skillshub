<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class Examcontroller extends Controller
{
    public function show($id)
    {
        $data['exam'] = Exam::findOrfail($id);

        $user = Auth::user();
        $data['canViewStartBtn'] = true;

        if ($user !== null) {
            $pivotRow = $user->exams()->where('exam_id', $id)->first();
            if ($pivotRow !== null and $pivotRow->pivot->status == 'closed') {
                $data['canViewStartBtn'] = false;
            }
        }

        return view('web.exam.show')->with($data);
    }

    public function start($examId, Request $request)
    {
        $user = Auth::user();

        $request->session()->flash('prev', "start/$examId");

        $findUser = $user->exams()->where('exam_id', $examId)->first();
        if ($findUser !== null) {
            $user->exams()->detach([
                1 => ['user_id' => $user->id],
                2 => ['exam_id' => $examId],
            ]);
            $user->exams()->attach($examId);
        } else {
            $user->exams()->attach($examId);
        }
        return redirect(url("exam/questions/$examId"));
    }

    public function question($examId, Request $request)
    {
        if (session('prev') !== "start/$examId") {
            return redirect(url("exam/show/$examId"));
        }
        $request->session()->flash('prev', "question/$examId");

        $data['exam'] = Exam::findOrfail($examId);
        return view('web.exam.question')->with($data);
    }

    public function submit($examId, Request $request)
    {
        $user = Auth::user();
        $exam = Exam::findOrfail($examId);
        $examNum = $exam->questions->count();

        if (session('prev') !== "question/$examId") {
            return redirect(url("exam/show/$examId"));
        }

        $request->validate([
            'answers' => [
                'required',
                'array',
            ],
            'answers.*' => 'required|in:1,2,3,4',

        ]);

        $exam = Exam::findOrFail($examId);

        $points = 0;
        $totalQuesNum = $exam->questions()->count();

        foreach ($exam->questions as $question) {
            if (isset($request->answers[$question->id])) {
                $userAns = $request->answers[$question->id];
                $righAns = $question->right_ans;

                if ($userAns == $righAns) {
                    $points += 1;
                }
            }
        }

        $score = round(($points / $totalQuesNum) * 100, 2);

        //Calculating Time Mins

        $pivotRow = $user->exams()->where('exam_id', $examId)->first();
        $startTime = $pivotRow->pivot->created_at;
        $submitTime = Carbon::now();

        $timeMins = $submitTime->diffInMinutes($startTime);

        if ($timeMins > $pivotRow->duration_mins) {
            $score = 0;
        }
        //Update Pivot Row
        $user->exams()->updateExistingPivot($examId, [
            'score' => $score,
            'time_mins' => $timeMins,
            'status' => "closed",
        ]);

        $request->session()->flash('success', __('web.endexam') . $score . "%");

        return redirect(url("exam/show/$examId"));
    }
}
