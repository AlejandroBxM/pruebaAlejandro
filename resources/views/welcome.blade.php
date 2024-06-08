@include('header')

<main class="mt-6">
    <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">


            <div class="relative flex items-center gap-6 lg:items-end">
                <div id="docs-card-content" class="flex items-start gap-6 lg:flex-col">
                    <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
                        <svg class="size-5 sm:size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path fill="#FF2D20" d="M23 4a1 1 0 0 0-1.447-.894L12.224 7.77a.5.5 0 0 1-.448 0L2.447 3.106A1 1 0 0 0 1 4v13.382a1.99 1.99 0 0 0 1.105 1.79l9.448 4.728c.14.065.293.1.447.1.154-.005.306-.04.447-.105l9.453-4.724a1.99 1.99 0 0 0 1.1-1.789V4ZM3 6.023a.25.25 0 0 1 .362-.223l7.5 3.75a.251.251 0 0 1 .138.223v11.2a.25.25 0 0 1-.362.224l-7.5-3.75a.25.25 0 0 1-.138-.22V6.023Zm18 11.2a.25.25 0 0 1-.138.224l-7.5 3.75a.249.249 0 0 1-.329-.099.249.249 0 0 1-.033-.12V9.772a.251.251 0 0 1 .138-.224l7.5-3.75a.25.25 0 0 1 .362.224v11.2Z" />
                            <path fill="#FF2D20" d="m3.55 1.893 8 4.048a1.008 1.008 0 0 0 .9 0l8-4.048a1 1 0 0 0-.9-1.785l-7.322 3.706a.506.506 0 0 1-.452 0L4.454.108a1 1 0 0 0-.9 1.785H3.55Z" />
                        </svg>
                    </div>

                    <div class="pt-3 sm:pt-5 lg:pt-0">
                        <h2 class="text-xl font-semibold text-black dark:text-white">Porfavor sube un archivo</h2>

                        <p class="mt-4 text-sm/relaxed">

                        <form action="{{route('puntosgps.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type='file' name='archivo' required /><br>
                            <button type="submit" class="button btn">Presioname</button>
                        </form>
                        </p>
                    </div>
                </div>

                <svg class="size-6 shrink-0 stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                </svg>
            </div>
</main>

@include('footer');