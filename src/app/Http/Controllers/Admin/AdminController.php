<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class AdminController extends Controller
{
     // クエリビルダのインスタンスを作成
    public function buildSearchQuery(Request $request)
    {
        $categories = Category::all();
        $query = Contact::query();

        if ($request->filled('keyword')) {
        $keyword = $request->input('keyword');
        $keywordSlim = str_replace([' ', '  '], '', $keyword);
        $query->where(function($q) use ($keyword, $keywordSlim) {
            $q->where('last_name', 'like', "%{$keyword}%")
              ->orWhere('first_name', 'like', "%{$keyword}%")
              ->orWhereRaw('CONCAT(last_name, first_name) LIKE ?', ["%{$keywordSlim}%"])
              ->orWhere('email', 'like', "%{$keyword}%");
        });
    }

        if ($request->filled('gender') && $request->input('gender') != 0) {
        $query->where('gender', $request->input('gender'));
    }

        if ($request->filled('category_id') && $request->input('category_id') != 0) {
        $query->where('category_id', $request->input('category_id'));
    }

        if ($request->filled('date')) {
        $query->whereDate('created_at', $request->input('date'));
    }
        return $query;

    }

    // お問い合わせ一覧の表示
    public function index(Request $request)
    {
        $categories = Category::all();
        $query = $this->buildSearchQuery($request);
        $contacts = $query->orderBy('created_at', 'desc')->paginate(7);

        return view('admin', compact('contacts', 'categories'));
    }

    // CSVエクスポート
    public function export(Request $request)
    {
        $query = $this->buildSearchQuery($request);
        $contacts = $query->get();
        $csvHeader = ['お名前', '性別', 'メールアドレス', 'お問い合わせの種類'];
        $csvData = [];

        foreach ($contacts as $contact) {
        $gender = ($contact->gender == 1) ? '男性' : (($contact->gender == 2) ? '女性' : 'その他');
        $csvData[] = [
        $contact->last_name . $contact->first_name,
        $gender,
        $contact->email,
        $contact->category->content,
        ];
    }

    $callback = function() use ($csvHeader, $csvData)
    {
        $file = fopen('php://output', 'w');
        fputs($file, $bom = chr(0xEF) . chr(0xBB) . chr(0xBF));
        fputcsv($file, $csvHeader);
        foreach ($csvData as $row)
            {
            fputcsv($file, $row);
            }
        fclose($file);
    };

    $header = [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename="contacts_' . date('Ymd') . '.csv"',
    ];

        return response()->stream($callback, 200, $header);
    }

    // お問い合わせの削除
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect('/admin')->with('success', 'お問い合わせを削除しました。');
    }
}
