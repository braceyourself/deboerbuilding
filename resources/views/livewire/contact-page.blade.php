<div class="container m-auto my-10">

    <h2 class="text-5xl text-center mb-10">Contact</h2>

    <div class="flex flex-col lg:flex-row justify-between gap-5 px-10">

        <div class="w-full ">
            {{ $this->form }}
        </div>

        <div class="lg:max-w-prose m-auto">
            {{ str(\App\Models\PageContent::firstWhere('slug', 'contact-page-info')?->content)->markdown()->toHtmlString() }}
        </div>

    </div>
</div>
