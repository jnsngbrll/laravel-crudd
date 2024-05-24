<x-app-layout>
    <div class="pagetitle">
        <h1>{{ __('View Post') }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">{{ __('Resources') }}</li>
                <li class="breadcrumb-item"><a href="{{ route('post.index') }}">{{ __('Posts') }}</a></li>
                <li class="breadcrumb-item active">{{ __('View Post') }}</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card p-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="card-title">{{ __('View Post') }}</h5>
                            <a href="{{ route('post.index') }}" type="button" class="btn btn-primary">Go Back</a>
                        </div>
                        <h4>Subject: {{ $post->subject }}</h4>
                        <p>Status: {!! $post->status == 1 ? '<small class="text-success">Published</small>' : '<small class="text-danger">Unpublished</small>' !!}</p>
                        <p>Post: {{ $post->post }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>