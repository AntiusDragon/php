<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForestController extends Controller
{
    public function labas(Request $request, $color1, $size) {
        return view('bebras', [
            'color' => $color1,
            'size' => $size,
            'word' => $request->a
        ]);
    }

    // COUNTER
    public function showCount() {
        // $result = session('result', 0); // pirmas varijantas
        // $result = session()->get('result', ''); // antras varijantas, kai istraukia informacija nenusinulina
        $result = session()->pull('result', ''); // trecias varijantas, kai istraukia informacija nusinulina

        return view('counter.count', [
            'result' => $result
        ]);
    }

    public function count(Request $request) {
        $count1 = $request->count1;
        $count2 = $request->count2;
        $result = $count1 + $count2;

        // session(['result' => $result]); // pirmas varijantas
        // session()->put('result', $result); // antras varijantas
        // session()->flash('result', $result); // trecias varijantas
        // $request->session()->flash('result', $result); // ketvirtas varijantas

        // return redirect()->route('count');
        return redirect()->route('count')->with('result', $result); // penktas varijantas
    }

    // SQUARES
    public function showSquares() {
        $count = session()->get('squares', 0);
        $squares = $count ? range(1, $count) : [];

        return view('sq.show', [
            'count' => $count,
            'squares' => $squares
        ]);
    }

    public function squares(Request $request) {
        $count = $request->count ?? 0;

        session()->put('squares', $count); // prideda prie senus informacijos

        return redirect()->route('squares');
        // return redirect()->route('squares')->with('squares', $count); // isvalo sesija (info)
    }

    public function addSquares(Request $request) {
        $count = $request->count ?? 0;
        $was = session()->get('squares', 0);
        $count += $was;

        session()->put('squares', $count);

        return redirect()->route('squares');
    }
}
