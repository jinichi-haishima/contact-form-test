<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        // クエリビルダのインスタンスを作成
        $query = Contact::query();

        if ($request->filled('keyword')) {
        $keyword = $request->input('keyword');
        $query->where(function($q) use ($keyword) {
            $q->where('fullname', 'like', "%{$keyword}%")
              ->orWhere('email', 'like', "%{$keyword}%");
        });
    }

        if ($request->filled('gender')) {
        $query->where('gender', $request->input('gender'));
    }

        if ($request->filled('category')) {
        $query->where('category_id', $request->input('category'));
    }

        if ($request->filled('date')) {
        $query->whereDate('created_at', $request->input('date'));
    }

        $contacts = $query->orderBy('created_at', 'desc')->paginate(7);
        $contacts = Contact::Paginate(7);

        return view('admin', compact('contacts', 'categories'));
    }
}
