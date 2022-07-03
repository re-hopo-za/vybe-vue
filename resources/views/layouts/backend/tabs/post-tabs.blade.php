<ul class="nav nav-pills card-header-pills justify-content-center">
    <li class="nav-item">
        <a class="nav-link {{ (request()->is('adminPanel/post/create/default')) ? 'active' : '' }}"
            {{ (request()->is('adminPanel/post/create/default')) ? '' : 'href='.route("post.create.createDefault") }}>معمولی</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ (request()->is('adminPanel/post/create/video')) ? 'active' : '' }}"
            {{ (request()->is('adminPanel/post/create/video')) ? '' : 'href='.route("post.create.createVideo") }}>ویدئویی</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ (request()->is('adminPanel/post/create/audio')) ? 'active' : '' }}"
            {{ (request()->is('adminPanel/post/create/audio')) ? '' : 'href='.route("post.create.createAudio") }}>صوتی</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ (request()->is('adminPanel/post/create/quote')) ? 'active' : '' }}"
            {{ (request()->is('adminPanel/post/create/quote')) ? '' : 'href='.route("post.create.createQuote") }}>نقل قول</a>
    </li>
</ul>
