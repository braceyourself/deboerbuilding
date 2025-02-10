<div class="flex flex-col justify-around py-10">
    <style>
        .about-page-modals {
            font-size: 1.5rem;
        }

        .about-page-modals h1 {
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 1rem;
        }

        .about-page-modals h2 {
            font-size: 2rem;
            text-align: center;
            margin-bottom: 1rem;
            text-decoration: underline;
        }

        .about-page-modals h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .about-page-modals li {
            padding-left: 1rem;
        }
    </style>

    <div class="about-page-modals flex flex-col md:flex-row md:justify-center gap-5 m-auto self-center w-full px-10">

{{--        job opportunities--}}
        <x-filament::modal id="job-opportunities" width="5xl" sticky-footer sticky-header class="mt-20">
            <x-slot name="trigger">
                <x-filament::button class="bg-primary-500 min-w-full">
                    Job Opportunities
                </x-filament::button>
            </x-slot>

            <x-slot:header>
                <h1>Job Opportunities</h1>
            </x-slot:header>

            {!! str(\App\Models\PageContent::firstWhere('slug', 'job-opportunities')->content)->markdown()->toHtmlString() !!}

        </x-filament::modal>


{{--        project process--}}
        <x-filament::modal id="job-opportunities" width="5xl" sticky-footer sticky-header class="mt-20">
            <x-slot name="trigger">
                <x-filament::button class="bg-primary-500 min-w-full">
                    Project Process
                </x-filament::button>
            </x-slot>

            <x-slot:header>
                <h1>Project Process</h1>
            </x-slot:header>

            {!! str(\App\Models\PageContent::firstWhere('slug', 'the-project-process')->content)->markdown()->toHtmlString() !!}

        </x-filament::modal>

{{--        company history--}}
        <x-filament::modal id="job-opportunities" width="5xl" sticky-footer sticky-header class="mt-20">
            <x-slot name="trigger">
                <x-filament::button class="bg-primary-500 min-w-full">
                    Company History
                </x-filament::button>
            </x-slot>

            <x-slot:header>
                <h1>Company History</h1>
            </x-slot:header>

            {!! str(\App\Models\PageContent::firstWhere('slug', 'company-history')->content)->markdown()->toHtmlString() !!}

        </x-filament::modal>
    </div>

</div>
