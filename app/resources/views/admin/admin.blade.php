@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class=col-md-8>
            <div class="card">
                <div class="card-header">{{ __('管理者ページ') }}</div>
                    <div class="card-body">
                        <center>
                            <a class="btn btn-link" href="{{ route('admin.user') }}">
                                {{ __('ユーザー一覧') }}
                            </a>
                        </center>
                    <div class="card-body">
                        <center>
                            <a class="btn btn-link" href="{{ route('admin.post') }}">
                                {{ __('投稿一覧') }}
                            </a>
                        </center>
                    <div class="card-body">
                        <center>
                            <a class="btn btn-link" href="{{ route('admin_restrant') }}">
                                {{ __('レストラン一覧') }}
                            </a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection