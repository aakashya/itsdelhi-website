{{-- resources/views/home.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Itz Delhi Times — Itz Delhi Restaurant</title>

  {{-- Google Fonts --}}
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Noto+Serif+Devanagari:wght@400;700&family=Mukta:wght@400;700&display=swap"
    rel="stylesheet">

  {{-- Tailwind CDN --}}
  <script src="https://cdn.tailwindcss.com"></script>

  {{-- Tailwind theme (CDN config) --}}
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            paper: '#f3efe7',
            ink: '#1a1a1a',
            ink2: '#444',
            accent: '#b0272c',
            accent2: '#0d6b6b',
            gold: '#c7a969',
          },
          fontFamily: {
            engravers: ['EngraversOldEnglish', 'serif'],
            basker: ['"Libre Baskerville"', '"Noto Serif Devanagari"', 'serif'],
            slab: ['"Alfa Slab One"', 'serif'],
          },
          boxShadow: {
            ink: '6px 6px 0 rgba(0,0,0,.18)',
            ink2: '10px 10px 0 rgba(0,0,0,.12)',
          }
        }
      }
    }
  </script>

  {{-- Minimal: custom font-face only --}}
  <style>
    @font-face {
      font-family: 'EngraversOldEnglish';
      src: url('{{ asset(' font/EngraversOldEnglish.otf') }}') format('opentype');
      font-weight: normal;
      font-style: normal;
    }

    @font-face {
      font-family: "OPTIEngraversOldEnglish";
      src: url("{{ asset('font/EngraversOldEnglish.otf') }}") format("opentype");
      font-weight: 400;
      font-style: normal;
      font-display: swap;
    }
  </style>
</head>

<body class="min-h-screen text-ink font-basker leading-relaxed bg-paper relative overflow-x-hidden
         [background:
           radial-gradient(1200px_800px_at_20%_10%,rgba(255,255,255,0.5),transparent_60%),
           radial-gradient(1000px_900px_at_80%_100%,rgba(0,0,0,0.03),transparent_60%),
           repeating-linear-gradient(0deg,transparent,transparent_6px,rgba(0,0,0,0.03)_7px,transparent_8px)
         ]">
  {{-- “Ink bleed” overlay --}}
  <div class="pointer-events-none fixed inset-0 mix-blend-multiply opacity-[0.03] z-0"
    style="background-image:url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22120%22 height=%22120%22%3E%3Cfilter id=%22n%22%3E%3CfeTurbulence baseFrequency=%220.65%22 numOctaves=%222%22/%3E%3CfeColorMatrix type=%22saturate%22 values=%220%22/%3E%3C/filter%3E%3Crect width=%22100%25%22 height=%22100%25%22 filter=%22url(%23n)%22/%3E%3C/svg%3E');">
  </div>

  {{-- Floating posters layer (clipped to Reserve section via JS) --}}
  <div id="floating-posters" class="hidden lg:block fixed inset-0 z-50 opacity-0 transition-opacity duration-300 pointer-events-none will-change-[clip-path,opacity]">
    @php
    $posters = [
    ['id'=>'poster1','style'=>'top:10%; left:5%;', 'src'=>asset('images/poster/poster1.jpeg')],
    ['id'=>'poster2','style'=>'top:24%; left:12%;', 'src'=>asset('images/poster/poster2.jpeg')],
    ['id'=>'poster3','style'=>'top:12%; right:6%;', 'src'=>asset('images/poster/poster3.jpeg')],
    ['id'=>'poster4','style'=>'top:28%; right:16%;','src'=>asset('images/poster/poster4.jpeg')],
    ['id'=>'poster5','style'=>'bottom:28%; left:14%;','src'=>asset('images/poster/Poster5.jpeg')],
    ['id'=>'poster6','style'=>'bottom:28%; right:14%;','src'=>asset('images/poster/poster6.jpeg')],
    ['id'=>'poster7','style'=>'bottom:12%; left:6%;', 'src'=>asset('images/poster/poster7.jpeg')],
    ['id'=>'poster8','style'=>'bottom:12%; right:6%;','src'=>asset('images/poster/poster9.jpeg')],
    ];
    @endphp

    @foreach ($posters as $p)
    <div id="{{ $p['id'] }}" class="absolute w-[120px] h-[160px] rounded-xl opacity-75 shadow-[0_6px_16px_rgba(0,0,0,.18)]
                  [background-size:cover] [background-position:center]
                  transition-transform duration-200 hover:opacity-100 hover:scale-[1.06]
                  [filter:saturate(1.1)_contrast(1.05)]" style="{{ $p['style'] }} background-image:url('{{ $p['src'] }}');">
    </div>
    @endforeach
  </div>

  {{-- ===== Masthead ===== --}}
  <header class="relative z-20 pt-5">
    <div class="mx-auto max-w-[1180px] px-5 flex items-center justify-center">
      <h1 style="font-family: OPTIEngraversOldEnglish, serif;"
        class="font-family: OPTIEngraversOldEnglish, serif; text-[clamp(2.4rem,4.8vw,3.75rem)] leading-none tracking-[.05em] text-ink drop-shadow-[0_1px_0_rgba(0,0,0,.12)]">
        Itz Delhi Times
      </h1>
    </div>
  </header>

  {{-- ===== Hero ===== --}}
  <section id="hero" class="relative z-20 mt-2 min-h-[75vh] grid place-items-center overflow-hidden">
    <video class="absolute inset-0 w-full h-full object-cover
                 [filter:grayscale(80%)_contrast(105%)_brightness(.85)]" autoplay muted loop playsinline
      poster="{{ asset('assets/hero-poster.jpg') }}">
      <source src="{{ asset('assets/hero.webm') }}" type="video/webm" />
      <source src="{{ asset('vidcan.mp4') }}" type="video/mp4" />
    </video>

    <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-transparent to-black/40"></div>

    <div class="relative text-center text-white px-5">
      <p class="uppercase tracking-[.08em] font-bold text-sm">खबरें गरम हैं!</p>
      <h2 class="font-slab mt-2 text-[clamp(1.75rem,4.6vw,3.25rem)] drop-shadow-[0_2px_8px_rgba(0,0,0,.8)]">
        From the heart of Delhi to the streets of Doncaster
      </h2>
    </div>
  </section>

  {{-- ===== Specials / Carousel ===== --}}
  <section id="chefs-specials-pro" class="relative z-20 py-12">
    <div class="mx-auto max-w-[1180px] px-5">
      <header class="text-left">
        <h2 class="font-slab text-[clamp(1.5rem,3.2vw,2.5rem)]">Chef’s Ledger • Signature Dishes</h2>
        <p class="italic text-ink2 mt-1">Three icons — a little history on every plate.</p>
      </header>

      <div class="mt-6">
        <div class="carousel relative select-none" data-autoplay="true" data-interval="5000" aria-roledescription="carousel">
          <div
            class="viewport overflow-hidden border border-black bg-white shadow-ink2 [box-shadow:10px_10px_0_rgba(0,0,0,.12),0_0_0_6px_rgba(0,0,0,.03)_inset]">
            <ul class="track flex transition-transform duration-500 ease-[cubic-bezier(.22,.61,.36,1)] will-change-transform" id="specials-track">
              {{-- Slide 1 --}}
              <li class="slide shrink-0 grow-0 basis-full max-w-full">
                <article
                  class="relative bg-white border border-black shadow-ink p-4 overflow-hidden
                         before:content-[''] before:absolute before:w-7 before:h-7 before:border before:border-black before:bg-paper before:rotate-45 before:-top-3.5 before:left-3
                         after:content-[''] after:absolute after:w-7 after:h-7 after:border after:border-black after:bg-paper after:rotate-45 after:-top-3.5 after:right-3">
                  <div class="grid gap-5 md:grid-cols-[minmax(280px,460px)_1fr]">
                    <figure class="relative border border-black shadow-[3px_3px_0_rgba(0,0,0,.12)] overflow-hidden">
                      <img class="w-full h-full object-cover aspect-[4/3] [filter:grayscale(35%)_contrast(110%)]"
                        src="{{ asset('images/samsa-samosas-with-meat.jpg') }}" alt="2 Samosas with chutney" />
                      <div class="absolute inset-0 bg-gradient-to-b from-white/5 via-transparent to-black/10"></div>
                      <figcaption
                        class="absolute right-3 top-3 bg-[#efe7d6] border-2 border-black px-2.5 py-1 text-sm font-bold rotate-[-3deg] shadow-[2px_2px_0_rgba(0,0,0,1)]">
                        £5.49
                      </figcaption>
                      <span class="absolute left-2.5 -bottom-2 font-slab font-extrabold text-[clamp(3rem,9vw,6rem)] text-black/10">01</span>
                    </figure>

                    <div class="px-1">
                      <div class="flex items-center gap-3">
                        <span
                          class="inline-block bg-[#efe7d6] border-2 border-black px-2 py-1 text-[0.75rem] font-extrabold uppercase tracking-[.06em]">
                          Delhi • Street Classic
                        </span>
                        <span class="h-px flex-1 bg-[repeating-linear-gradient(90deg,rgba(0,0,0,.25)_0_6px,transparent_6px_12px)]"></span>
                      </div>

                      <h3 class="font-slab mt-1 text-[clamp(1.35rem,2.6vw,1.9rem)]">2 Samosas &amp; Chutney</h3>

                      <p class="mt-1">
                        Delicate pastry parcels, generously filled with spiced potato and peas. Served with a lively, freshly made chutney — a simple
                        pleasure from the streets of Delhi.
                      </p>

                      <p class="mt-1 text-black/80">
                        <strong>Origin:</strong> Delhi street stalls; spread via railway canteens &amp; halwai shops in the early 20th century.
                      </p>

                      <ul class="mt-3 flex flex-wrap gap-2">
                        <li class="border border-black px-2 py-1 font-bold">V</li>
                        <li class="border border-black px-2 py-1 font-bold">Crisp &amp; Light</li>
                      </ul>
                    </div>
                  </div>
                </article>
              </li>

              {{-- Slide 2 --}}
              <li class="slide shrink-0 grow-0 basis-full max-w-full">
                <article
                  class="relative bg-white border border-black shadow-ink p-4 overflow-hidden
                         before:content-[''] before:absolute before:w-7 before:h-7 before:border before:border-black before:bg-paper before:rotate-45 before:-top-3.5 before:left-3
                         after:content-[''] after:absolute after:w-7 after:h-7 after:border after:border-black after:bg-paper after:rotate-45 after:-top-3.5 after:right-3">
                  <div class="grid gap-5 md:grid-cols-[minmax(280px,460px)_1fr]">
                    <figure class="relative border border-black shadow-[3px_3px_0_rgba(0,0,0,.12)] overflow-hidden">
                      <img class="w-full h-full object-cover aspect-[4/3] [filter:grayscale(35%)_contrast(110%)]"
                        src="{{ asset('images/kulche lassi.png') }}" alt="Amritsari Chole Kulche" />
                      <div class="absolute inset-0 bg-gradient-to-b from-white/5 via-transparent to-black/10"></div>
                      <figcaption
                        class="absolute right-3 top-3 bg-[#efe7d6] border-2 border-black px-2.5 py-1 text-sm font-bold rotate-[-3deg] shadow-[2px_2px_0_rgba(0,0,0,1)]">
                        £11.99
                      </figcaption>
                      <span class="absolute left-2.5 -bottom-2 font-slab font-extrabold text-[clamp(3rem,9vw,6rem)] text-black/10">02</span>
                    </figure>

                    <div class="px-1">
                      <div class="flex items-center gap-3">
                        <span
                          class="inline-block bg-[#efe7d6] border-2 border-black px-2 py-1 text-[0.75rem] font-extrabold uppercase tracking-[.06em]">
                          Amritsar • Punjabi Heritage
                        </span>
                        <span class="h-px flex-1 bg-[repeating-linear-gradient(90deg,rgba(0,0,0,.25)_0_6px,transparent_6px_12px)]"></span>
                      </div>

                      <h3 class="font-slab mt-1 text-[clamp(1.35rem,2.6vw,1.9rem)]">Amritsari Chole Kulche</h3>

                      <p class="mt-1">
                        Soft, fluffy kulchas with spiced chickpea curry — hearty, comforting, bold Punjabi flavour straight from Amritsar.
                      </p>

                      <p class="mt-1 text-black/80">
                        <strong>Origin:</strong> Walled city of Amritsar; tandoor-bakers serving kulcha with robust chole for generations.
                      </p>

                      <ul class="mt-3 flex flex-wrap gap-2">
                        <li class="border border-black px-2 py-1 font-bold">🌶️</li>
                        <li class="border border-black px-2 py-1 font-bold">Street Favorite</li>
                      </ul>
                    </div>
                  </div>
                </article>
              </li>

              {{-- Slide 3 --}}
              <li class="slide shrink-0 grow-0 basis-full max-w-full">
                <article
                  class="relative bg-white border border-black shadow-ink p-4 overflow-hidden
                         before:content-[''] before:absolute before:w-7 before:h-7 before:border before:border-black before:bg-paper before:rotate-45 before:-top-3.5 before:left-3
                         after:content-[''] after:absolute after:w-7 after:h-7 after:border after:border-black after:bg-paper after:rotate-45 after:-top-3.5 after:right-3">
                  <div class="grid gap-5 md:grid-cols-[minmax(280px,460px)_1fr]">
                    <figure class="relative border border-black shadow-[3px_3px_0_rgba(0,0,0,.12)] overflow-hidden">
                      <img class="w-full h-full object-cover aspect-[4/3] [filter:grayscale(35%)_contrast(110%)]"
                        src="{{ asset('images/butter-chicken-with-rice-naan.jpg') }}" alt="Butter Chicken" />
                      <div class="absolute inset-0 bg-gradient-to-b from-white/5 via-transparent to-black/10"></div>
                      <figcaption
                        class="absolute right-3 top-3 bg-[#efe7d6] border-2 border-black px-2.5 py-1 text-sm font-bold rotate-[-3deg] shadow-[2px_2px_0_rgba(0,0,0,1)]">
                        £14.99
                      </figcaption>
                      <span class="absolute left-2.5 -bottom-2 font-slab font-extrabold text-[clamp(3rem,9vw,6rem)] text-black/10">03</span>
                    </figure>

                    <div class="px-1">
                      <div class="flex items-center gap-3">
                        <span
                          class="inline-block bg-[#efe7d6] border-2 border-black px-2 py-1 text-[0.75rem] font-extrabold uppercase tracking-[.06em]">
                          Old Delhi • Makhani
                        </span>
                        <span class="h-px flex-1 bg-[repeating-linear-gradient(90deg,rgba(0,0,0,.25)_0_6px,transparent_6px_12px)]"></span>
                      </div>

                      <h3 class="font-slab mt-1 text-[clamp(1.35rem,2.6vw,1.9rem)]">Butter Chicken</h3>

                      <p class="mt-1">
                        Tender chicken in a silky tomato-makhani sauce — smoky tandoor notes balanced by butter and cream.
                      </p>

                      <p class="mt-1 text-black/80">
                        <strong>Origin:</strong> Post-partition Delhi; popularised by Moti Mahal — tandoori leftovers simmered in buttery makhani
                        gravy.
                      </p>

                      <ul class="mt-3 flex flex-wrap gap-2">
                        <li class="border border-black px-2 py-1 font-bold">House Favorite</li>
                        <li class="border border-black px-2 py-1 font-bold">Rich &amp; Silky</li>
                      </ul>
                    </div>
                  </div>
                </article>
              </li>
            </ul>
          </div>

          {{-- Controls --}}
          <button class="nav prev absolute left-2.5 top-1/2 -translate-y-1/2 w-10 h-10 grid place-items-center
                         border-2 border-black bg-[#efe7d6] shadow-[2px_2px_0_rgba(0,0,0,1)]
                         font-bold text-xl leading-none hover:-translate-y-[52%] transition-transform" aria-label="Previous slide"
            type="button">‹</button>

          <button class="nav next absolute right-2.5 top-1/2 -translate-y-1/2 w-10 h-10 grid place-items-center
                         border-2 border-black bg-[#efe7d6] shadow-[2px_2px_0_rgba(0,0,0,1)]
                         font-bold text-xl leading-none hover:-translate-y-[52%] transition-transform" aria-label="Next slide"
            type="button">›</button>

          {{-- Dots --}}
          <div class="dots flex items-center justify-center gap-2.5 py-3" role="tablist" aria-label="Choose slide">
            <button class="dot is-active w-3.5 h-3.5 rounded-full border-[1.6px] border-black bg-black" role="tab" aria-controls="specials-track"
              aria-selected="true" data-index="0"></button>
            <button class="dot w-3.5 h-3.5 rounded-full border-[1.6px] border-black bg-white" role="tab" aria-controls="specials-track"
              aria-selected="false" data-index="1"></button>
            <button class="dot w-3.5 h-3.5 rounded-full border-[1.6px] border-black bg-white" role="tab" aria-controls="specials-track"
              aria-selected="false" data-index="2"></button>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- ===== Origin Trail ===== --}}
  <section class="relative z-20 py-10">
    <div class="mx-auto max-w-[1180px] px-5">
      <header class="text-center">
        <h2 id="origin-trail-title" class="font-slab text-[clamp(1.5rem,3.2vw,2.5rem)]">Origin Trail</h2>
        <p class="italic text-ink2 mt-1 max-w-[920px] mx-auto">
          From Punjabi tandoors and Old Delhi bazaars to Rajasthan’s thali spirit — finally plated in Doncaster.
        </p>
      </header>

      <ol class="mt-4 border border-black bg-white shadow-ink p-3 grid grid-cols-1 sm:grid-cols-4 gap-2 items-center" aria-label="Route: Punjab to Doncaster">
        @php
        $stops = ['Punjab', 'Old Delhi', 'Rajasthan', 'Doncaster'];
        @endphp
        @foreach($stops as $i => $s)
        <li class="flex items-center justify-center gap-2 py-2 {{ $i === 3 ? 'font-bold' : '' }}">
          <span class="w-3 h-3 rounded-full border-2 border-black shadow-[2px_2px_0_rgba(0,0,0,.12)] {{ $i === 3 ? 'bg-black' : 'bg-white' }}"></span>
          <span class="font-bold tracking-wide">{{ $s }}</span>
        </li>
        @endforeach
      </ol>

      <div class="mt-6 grid gap-5 md:grid-cols-2 lg:grid-cols-3">
        {{-- Punjab --}}
        <article
          class="relative bg-white border border-black shadow-ink p-4
                        before:content-[''] before:absolute before:w-7 before:h-7 before:border before:border-black before:bg-paper before:rotate-45 before:-top-3.5 before:left-3
                        after:content-[''] after:absolute after:w-7 after:h-7 after:border after:border-black after:bg-paper after:rotate-45 after:-top-3.5 after:right-3">
          <header class="mb-2">
            <span
              class="inline-block bg-[#efe7d6] border-2 border-black px-2 py-1 text-[0.75rem] font-extrabold uppercase tracking-[.08em]">Punjab</span>
            <h3 class="font-slab text-xl mt-1">Tandoors, Dhabas &amp; Dairy</h3>
            <p class="text-sm text-black/80">Grand Trunk Road • Amritsar &amp; beyond</p>
          </header>

          <figure class="border border-black shadow-[3px_3px_0_rgba(0,0,0,.12)] overflow-hidden mt-2">
            <img class="w-full h-[300px] object-cover [filter:grayscale(25%)_contrast(108%)]"
              src="{{ asset('images/top-view-pakistani-meal-arrangement.jpg') }}" alt="Amritsari kulcha with chole">
            <figcaption class="px-3 py-2 text-sm bg-[#faf7ee] border-t border-black">Amritsari Chole Kulche • Lassi culture</figcaption>
          </figure>

          <p class="mt-3">
            Generous spice, slow-simmered gravies, and fresh dairy. Roadside dhabas carried these flavours across North India — and far beyond.
          </p>

          <ul class="mt-3 grid gap-1 text-sm">
            <li class="flex gap-2"><span class="font-bold">•</span>Amritsari Chole Kulche</li>
            <li class="flex gap-2"><span class="font-bold">•</span>Punjabi Chole (Rice Bowl)</li>
            <li class="flex gap-2"><span class="font-bold">•</span>Paneer Makhani</li>
            <li class="flex gap-2"><span class="font-bold">•</span>Amritsari Kulcha</li>
            <li class="flex gap-2"><span class="font-bold">•</span>Mango / Rose Lassi</li>
          </ul>

          <div class="mt-4 grid gap-2">
            <div class="border border-black bg-white shadow-[2px_2px_0_rgba(0,0,0,.06)] p-3">
              <strong>Then:</strong> Kulchas puffed in tandoors, chole in brass pots; churned lassi for heat.
            </div>
            <div class="border border-black bg-[#efe7d6] shadow-[2px_2px_0_rgba(0,0,0,.06)] p-3">
              <strong>Now:</strong> Fluffy kulcha, bold chole, and chilled lassi — straight to your table in Doncaster.
            </div>
          </div>
        </article>

        {{-- Old Delhi --}}
        <article
          class="relative bg-white border border-black shadow-ink p-4
                        before:content-[''] before:absolute before:w-7 before:h-7 before:border before:border-black before:bg-paper before:rotate-45 before:-top-3.5 before:left-3
                        after:content-[''] after:absolute after:w-7 after:h-7 after:border after:border-black after:bg-paper after:rotate-45 after:-top-3.5 after:right-3">
          <header class="mb-2">
            <span class="inline-block bg-[#efe7d6] border-2 border-black px-2 py-1 text-[0.75rem] font-extrabold uppercase tracking-[.08em]">Old
              Delhi</span>
            <h3 class="font-slab text-xl mt-1">Partition, Bazaars &amp; Chaat</h3>
            <p class="text-sm text-black/80">Daryaganj • Chandni Chowk</p>
          </header>

          <figure class="border border-black shadow-[3px_3px_0_rgba(0,0,0,.12)] overflow-hidden mt-2">
            <img class="w-full h-[300px] object-cover [filter:grayscale(25%)_contrast(108%)]"
              src="{{ asset('images/butter-chicken-with-rice-naan.jpg') }}" alt="Butter chicken and Old Delhi chaat">
            <figcaption class="px-3 py-2 text-sm bg-[#faf7ee] border-t border-black">Butter Chicken • Samosa &amp; Papdi Chaat</figcaption>
          </figure>

          <p class="mt-3">
            Post-Partition tandoors met buttery tomato gravies; bazaars perfected the art of tangy-sweet, chatpata snacks.
          </p>

          <ul class="mt-3 grid gap-1 text-sm">
            <li class="flex gap-2"><span class="font-bold">•</span>Butter Chicken</li>
            <li class="flex gap-2"><span class="font-bold">•</span>2 Samosas &amp; Chutney</li>
            <li class="flex gap-2"><span class="font-bold">•</span>Samosa Chaat</li>
            <li class="flex gap-2"><span class="font-bold">•</span>Papdi Chaat</li>
            <li class="flex gap-2"><span class="font-bold">•</span>Butter Chicken Rice Bowl</li>
          </ul>

          <div class="mt-4 grid gap-2">
            <div class="border border-black bg-white shadow-[2px_2px_0_rgba(0,0,0,.06)] p-3">
              <strong>Then:</strong> Tandoori chicken revived in makhani gravy; bazaar carts serving quick chaat theatre.
            </div>
            <div class="border border-black bg-[#efe7d6] shadow-[2px_2px_0_rgba(0,0,0,.06)] p-3">
              <strong>Now:</strong> Smoke, butter, and tang in balance — our Delhi note in Doncaster.
            </div>
          </div>
        </article>

        {{-- Rajasthan --}}
        <article
          class="relative bg-white border border-black shadow-ink p-4
                        before:content-[''] before:absolute before:w-7 before:h-7 before:border before:border-black before:bg-paper before:rotate-45 before:-top-3.5 before:left-3
                        after:content-[''] after:absolute after:w-7 after:h-7 after:border after:border-black after:bg-paper after:rotate-45 after:-top-3.5 after:right-3">
          <header class="mb-2">
            <span
              class="inline-block bg-[#efe7d6] border-2 border-black px-2 py-1 text-[0.75rem] font-extrabold uppercase tracking-[.08em]">Rajasthan</span>
            <h3 class="font-slab text-xl mt-1">Desert Pantry &amp; Thali Spirit</h3>
            <p class="text-sm text-black/80">Jaipur • Jodhpur • Highways</p>
          </header>

          <figure class="border border-black shadow-[3px_3px_0_rgba(0,0,0,.12)] overflow-hidden mt-2">
            <img class="w-full h-[300px] object-cover [filter:grayscale(25%)_contrast(108%)]" src="{{ asset('images/pickle.png') }}"
              alt="Rajasthani thali with papad and pickles">
            <figcaption class="px-3 py-2 text-sm bg-[#faf7ee] border-t border-black">Pickles, papad &amp; the generous thali</figcaption>
          </figure>

          <p class="mt-3">
            Preserved flavours for long journeys — papad, pickles, hearty spreads. Hospitality that says “eat more.”
          </p>

          <ul class="mt-3 grid gap-1 text-sm">
            <li class="flex gap-2"><span class="font-bold">•</span>Poppadom &amp; Pickle Tray</li>
            <li class="flex gap-2"><span class="font-bold">•</span>Chicken Thali</li>
            <li class="flex gap-2"><span class="font-bold">•</span>Veg. Thali (V)</li>
            <li class="flex gap-2"><span class="font-bold">•</span>Sweet lassi shop culture</li>
          </ul>

          <div class="mt-4 grid gap-2">
            <div class="border border-black bg-white shadow-[2px_2px_0_rgba(0,0,0,.06)] p-3">
              <strong>Then:</strong> Caravan routes &amp; highway dhabas; pickles and papad built to travel.
            </div>
            <div class="border border-black bg-[#efe7d6] shadow-[2px_2px_0_rgba(0,0,0,.06)] p-3">
              <strong>Now:</strong> Crisp papad, lively pickles, generous thalis — Rajasthan on a plate in Doncaster.
            </div>
          </div>
        </article>
      </div>

      <p class="mt-6 text-center font-bold tracking-wide">
        Recipes travel by train lines, market lanes, and memory. Punjab → Old Delhi → Rajasthan → <span class="font-extrabold">Doncaster</span>.
      </p>
    </div>
  </section>

  {{-- ===== MENU (Tailwind + Accordion) ===== --}}
  <section class="relative z-20 py-10">
    {{-- Full-bleed background layer behind menu --}}
    <div class="absolute inset-0 -z-10">
    </div>
    <div class="absolute inset-0 -z-10"></div>
    <div class="absolute inset-0 -z-10"></div>

    <div class="mx-auto max-w-[1180px] px-4">
      <div class="border-2 border-black shadow-ink bg-[#fffdf0]/95 backdrop-blur-[1px] p-8 md:p-10">
        <div class="mb-6">
          <h3 class="font-bold tracking-wider text-lg">FROM THE STREETS OF DELHI</h3>
          <p class="mt-2 text-ink2 text-[0.95rem]">
            The flavours of Delhi have always brought people together. From bustling bazaars to quiet family kitchens, food crossed every border.
            Itz Delhi proudly carries that tradition forward — a true taste of home, now in Doncaster.
          </p>
        </div>

        @php
        $menu = [
        ['title'=>'LUNCH SPECIALS', 'items'=>[
        ['name'=>'Amritsari Chole Kulche (V)', 'price'=>'£8.99', 'desc'=>'Soft, fluffy kulchas served with spiced chickpea curry, straight from the
        streets of Amritsar. Hearty, comforting, and full of bold Punjabi flavour.'],
        ]],
        ['title'=>'SMALL PLATES', 'items'=>[
        ['name'=>'Onion Bhaji', 'price'=>'£2.99', 'desc'=>'Crisp golden fritters, made from thinly sliced onions tossed in a spiced gram flour batter.
        Served with a vibrant, freshly made chutney — a timeless favourite from the streets of Delhi. (V)'],
        ['name'=>'2 Samosas & Chutney (V)', 'price'=>'£3.99', 'desc'=>'Delicate pastry parcels, generously filled with spiced potato and peas. Served
        with a lively, freshly made chutney — a simple pleasure from the streets of Delhi.'],
        ['name'=>'Samosa Chaat (V)', 'price'=>'£5.99', 'desc'=>'A crushed samosa layered with spiced chickpeas, cooling yoghurt, and fresh chutneys. A
        vibrant, comforting dish loved on the streets of Delhi.'],
        ['name'=>'Aloo Tikki Chaat (V)', 'price'=>'£5.99', 'desc'=>'Crispy, spiced potato tikki served with tangy yogurt, chutneys, and a sprinkle of
        spices. A deliciously savoury and crunchy chaat that’s bursting with flavor!'],
        ['name'=>'Chilli Garlic Chicken 🌶️🌶️🌶️', 'price'=>'£6.99', 'desc'=>'Crispy chicken tossed in a spicy Indo-Chinese garlic sauce with spring
        onions and red chillies. A fiery favourite — bold, addictive, and full of flavours.'],
        ['name'=>'Sticky Chicken 🌶️', 'price'=>'£6.99', 'desc'=>'Crispy chicken tossed in a rich, sweet-soy and chilli glaze, with garlic and a dash
        of spice. A bold Indo-Chinese classic — sticky, savoury, and full of flavour.'],
        ['name'=>'Halloumi 🌶️', 'price'=>'£4.99', 'desc'=>'Golden, crispy-edged halloumi slices drizzled with a zesty chilli-lime glaze, balanced
        with a hint of garlic and herbs. A Mediterranean favourite — savoury, smoky, and irresistibly moreish. 8pcs'],
        ]],
        ['title'=>'GRILLS', 'items'=>[
        ['name'=>'Veg. Grilled Sandwich (V)', 'price'=>'£6.99', 'desc'=>'A golden toasted sandwich filled with bell peppers, onions, jalapeños,
        sweetcorn, and melted mozzarella. Finished with a touch of mayonnaise, warm, creamy, and full of flavour.'],
        ['name'=>'Paneer Grilled Sandwich (V)', 'price'=>'£6.99', 'desc'=>'Toasted bread filled with spiced paneer, peppers, onions, jalapeños,
        sweetcorn, mozzarella, and a touch of mayo. Inspired by Delhi’s bustling sandwich stalls. Creamy, bold, and bursting with flavour.'],
        ['name'=>'Chicken Grilled Sandwich', 'price'=>'£7.99', 'desc'=>'Chicken layered with bell peppers, onions, jalapeños, sweetcorn, and
        mozzarella, pressed in golden toasted bread. Creamy, cheesy, and full of comforting flavour.'],
        ['name'=>'Chilli Chicken Grilled Sandwich', 'price'=>'£7.99', 'desc'=>'Chicken layered with bell peppers, onions, jalapeños, sweetcorn, and
        mozzarella, pressed in golden toasted bread. Creamy, cheesy, and full of comforting flavour.'],
        ]],
        ['title'=>'BURGERS', 'items'=>[
        ['name'=>'Veg. Tikki Burger (V)', 'price'=>'£3.99', 'desc'=>'Crispy vegetable goujons layered with lettuce, red onion, and a touch of sweet
        chilli, all inside a soft toasted bun. A crunchy, flavour-packed vegetarian delight.'],
        ['name'=>'Chicken Burger', 'price'=>'£4.99', 'desc'=>'A hearty street-style classic packed with flavour.'],
        ['name'=>'Chilli Chicken Street Styled Burger', 'price'=>'£5.99', 'desc'=>'Spicy chilli chicken layered with crisp lettuce, red onion, and a
        drizzle of chutney, all inside a soft toasted bun. Bold, fiery, and full of Delhi street-style flavour.'],
        ['name'=>'Chicken Fillet Burger 🌶️', 'price'=>'£5.99', 'desc'=>'A crispy chicken fillet layered with fresh lettuce, red onion, and chutney,
        inside a soft toasted bun. Simple, satisfying, and full of street-style flavour.'],
        ['name'=>'Butter Chicken Tikka Burger', 'price'=>'£5.99', 'desc'=>'Succulent butter chicken tikka layered with fresh lettuce, red onion, and
        chutney, inside a soft toasted bun. Rich, creamy, and full of Delhi street-style flavour.'],
        ['name'=>'Jumbo Indian Chicken Burger', 'price'=>'£6.99', 'desc'=>'A jumbo spiced chicken patty stacked with fresh lettuce, red onion, and
        chutney, inside a soft toasted bun. Big, bold, and bursting with Indian street-style flavour.'],
        ]],
        ['title'=>'RICE BOWL', 'items'=>[
        ['name'=>'Punjabi Chole Rice Bowl 🌶️', 'price'=>'£6.99', 'desc'=>'Fragrant pilau rice topped with slow-cooked chickpeas in a rich, spiced
        Punjabi gravy, finished with onions, spring onions, and coriander. Wholesome, hearty, and full of North Indian soul. (V)'],
        ['name'=>'Rajma Rice Bowl 🌶️', 'price'=>'£7.99', 'desc'=>'Fragrant pilau rice topped with kidney bean simmered in a rich, buttery tomato
        gravy, finished with onions, spring onions, and coriander. Creamy, comforting, and full of North Indian soul. (V)'],
        ['name'=>'Butter Chicken Rice Bowl 🌶️', 'price'=>'£7.99', 'desc'=>'Fragrant pilau rice topped with tender chicken in a rich, creamy butter
        masala, finished with fresh coriander and spring onions. A beloved classic — hearty, indulgent, and full of North Indian flavour.'],
        ['name'=>'Chicken Tikka Rice Bowl 🌶️', 'price'=>'£6.99', 'desc'=>'Fragrant pilau rice topped with tender chicken tikka pieces in a spiced
        gravy, finished with onions, spring onions, and coriander. Smoky, hearty, and full of North Indian soul.'],
        ['name'=>'Chicken Jalfrezi Rice bowl 🌶️', 'price'=>'£6.99', 'desc'=>'Fragrant pilau rice topped with chicken cooked in a tangy, spiced
        jalfrezi gravy, finished with onions, spring onions, and coriander. Zesty, hearty, and full of Delhi soul. (V)'],
        ]],
        ['title'=>'WRAPS', 'items'=>[
        ['name'=>'Veg Wrap', 'price'=>'£4.99', 'desc'=>'A soft tortilla filled with spiced vegetables, fresh salad, and chutney, rolled up
        street-style. Light, flavourful, and full of Delhi soul. (V)'],
        ['name'=>'Veg Burrito', 'price'=>'£6.99', 'desc'=>'A warm tortilla stuffed with fragrant rice, spiced vegetables, fresh salad, and chutney,
        wrapped up street-style. Wholesome, hearty, and full of Delhi soul. (V)'],
        ['name'=>'Paneer Wrap', 'price'=>'£5.49', 'desc'=>'A soft tortilla filled with spiced paneer, fresh salad, and chutney, rolled up
        street-style. Creamy, flavourful, and full of Delhi soul. (V)'],
        ['name'=>'Paneer Burrito', 'price'=>'£7.49', 'desc'=>'A warm tortilla stuffed with fragrant rice, spiced paneer, fresh salad, and chutney,
        wrapped up street-style. Wholesome, hearty, and full of Delhi soul. (V)'],
        ['name'=>'Chicken Wrap', 'price'=>'£5.99', 'desc'=>'A soft tortilla filled with spiced chicken fillet, fresh salad, and chutney, rolled up
        street-style. Juicy, flavourful, and full of Delhi soul.'],
        ['name'=>'Chicken Burrito', 'price'=>'£7.99', 'desc'=>'A warm tortilla stuffed with fragrant rice, spiced chicken, fresh salad, and chutney,
        wrapped up street-style. Hearty, satisfying, and full of Delhi soul.'],
        ]],
        ['title'=>'THALI', 'items'=>[
        ['name'=>'Rajma Thali (V)', 'price'=>'£8.99', 'desc'=>'A vibrant vegetarian spread featuring Kidney beans curry, served with 1 samosa, pilau
        rice, half kulcha, fresh salad. A wholesome celebration of North Indian flavours.'],
        ['name'=>'Butter Chicken Thali', 'price'=>'£9.99', 'desc'=>'A grand feast on a plate including butter chicken curry. Served with 1 samosa,
        pilau rice, half kulcha, fresh salad. A true taste of India in every bite.'],
        ['name'=>'Chicken Tikka Thali', 'price'=>'£9.99', 'desc'=>'A grand feast on a plate including chicken tikka curry. Served with 1 samosa, pilau
        rice, half kulcha, fresh salad. A true taste of India in every bite.'],
        ['name'=>'Chicken Jalfrezi Thali', 'price'=>'£9.99', 'desc'=>'A grand feast on a plate with chicken jalfrezi curry. Served with 1 samosa,
        pilau rice, half kulcha, fresh salad. A true taste of India in every bite.'],
        ]],
        ['title'=>'CHIPS', 'items'=>[
        ['name'=>'Salted Chips', 'price'=>'£2.99'],
        ['name'=>'Masala Chips', 'price'=>'£2.99'],
        ['name'=>'Special Indian Chilli Chips', 'price'=>'£4.99'],
        ['name'=>'Butter Chicken Chips', 'price'=>'£4.99'],
        ['name'=>'Chicken Tikka Masala Chips', 'price'=>'£4.99'],
        ]],
        ['title'=>'DRINKS', 'items'=>[
        ['name'=>'Coke', 'price'=>'£1.49'],
        ['name'=>'Diet Coke', 'price'=>'£1.29'],
        ['name'=>'Coke Zero', 'price'=>'£1.29'],
        ]],
        ['title'=>'LASSI', 'items'=>[
        ['name'=>'MANGO LASSI', 'price'=>'£4.99', 'desc'=>'Born in Punjab, Mango Lassi blends sweet mangoes with creamy yogurt. Once a royal
        refreshment, now a global favourite to cool and comfort.'],
        ['name'=>'ROSE LASSI', 'price'=>'£4.99', 'desc'=>'A North Indian classic, Rose Lassi combines creamy yogurt with floral rose syrup.
        Traditionally sipped in summer for its cooling, calming effect.'],
        ]],
        ['title'=>'SHAKES', 'items'=>[
        ['name'=>'Oreo Shake', 'price'=>'£4.99', 'desc'=>'Made with rich vanilla ice cream and real Oreo cookies for a smooth, classic delight.'],
        ['name'=>'Strawberry Shake', 'price'=>'£4.99', 'desc'=>'Made with real strawberries and creamy vanilla ice cream for a refreshing, fruity
        classic.'],
        ['name'=>'Kitkat Shake', 'price'=>'£5.99', 'desc'=>'Made with creamy vanilla ice cream and crunchy Kit Kat bars, blended into a smooth,
        chocolatey treat.'],
        ['name'=>'Chocolate Shake', 'price'=>'£4.99', 'desc'=>'A creamy blend of vanilla ice cream, milk, and rich chocolate syrup, topped with
        whipped cream.'],
        ]],
        ['title'=>'COMBOS', 'items'=>[
        ['name'=>'KIDS MEAL', 'price'=>'£3.99', 'desc'=>'5 Chicken Nuggets + Chips + Fruit Shoot'],
        ['name'=>'Extra', 'price'=>'just @ £1.99', 'desc'=>'Make it a meal by adding Chips + Drink (Can)<br><em>*Only applicable on Mains (grills,
          Burger, rice bowl, wrap, thali)</em>'],
        ]],
        ];
        @endphp

        {{-- Accordion --}}
        <div class="mt-8 space-y-6" id="menu-accordion">
          @foreach($menu as $i => $block)
          @php
          $open = ($i === 0); // first open
          $panelId = 'menu-panel-' . $i;
          $btnId = 'menu-btn-' . $i;
          @endphp

          <section class="menu-block" data-default-open="{{ $open ? 'true' : 'false' }}">
            <h3 class="border-b border-black pb-2">
              <button id="{{ $btnId }}" class="acc-btn w-full flex items-center justify-between text-left font-slab text-2xl" type="button"
                aria-controls="{{ $panelId }}" aria-expanded="{{ $open ? 'true' : 'false' }}">
                <span>{{ $block['title'] }}</span>

                {{-- Arrow bubble --}}
                <span class="acc-arrow inline-grid place-items-center w-8 h-8 rounded-full border-2 border-black bg-[#fffdf0]
                         shadow-[2px_2px_0_rgba(0,0,0,.12)] text-lg leading-none transition-transform duration-200" aria-hidden="true">
                  {{ $open ? '▾' : '▸' }}
                </span>
              </button>
            </h3>

            <div id="{{ $panelId }}" class="acc-panel mt-4 grid gap-5 md:grid-cols-2 {{ $open ? '' : 'hidden' }}">
              @foreach($block['items'] as $item)
              <div>
                <div class="grid grid-cols-[1fr_auto] gap-3 items-baseline">
                  <h4 class="font-bold">{{ $item['name'] }}</h4>
                  <span class="font-bold whitespace-nowrap">{{ $item['price'] }}</span>
                </div>

                @if(!empty($item['desc']))
                <p class="text-[0.95rem] mt-1 text-ink2">{!! $item['desc'] !!}</p>
                @endif
              </div>
              @endforeach
            </div>
          </section>
          @endforeach
        </div>

        {{-- Legend + notices --}}
        <div class="mt-10 border-t border-black pt-6 text-ink2 text-sm">
          <p class="text-center font-semibold mb-3">🌶️ = Spice &nbsp; | &nbsp; (V) = Vegetarian &nbsp; | &nbsp; (N) = Contains Nuts</p>

          <div class="grid gap-4">
            <p>
              Dishes marked (V) are vegetarian but may contain eggs. Those marked (N) contain nuts. While we take every care to prevent
              cross-contamination, we cannot guarantee our food and drinks are completely allergen-free.
            </p>
            <p>
              Please inform us of any allergies or dietary requirements — we’re happy to help. We add an optional 12.5% service charge to your bill,
              all of which goes to our team. If your experience wasn’t up to the mark, just let us know; we’re happy to remove it.
            </p>
          </div>

          <blockquote class="mt-6 border-l-4 border-accent bg-black/10 p-4 italic text-ink">
            “दिल जीते बिना बात नहीं बनती”—our food aims straight for the दिल.
          </blockquote>
        </div>
      </div>
    </div>
  </section>

  {{-- ===== Palm Leaf ===== --}}
  <section id="palm" class="relative z-20 py-12">
    <div class="mx-auto max-w-[1180px] px-5">
      <header>
        <h2 class="font-slab text-[clamp(1.4rem,3.2vw,2.25rem)]">ITZ DELHI ♥ EARTH — Serving on Palm Leaves</h2>
      </header>

      <article
        class="mt-6 relative bg-white border border-black shadow-ink p-4
                      before:content-[''] before:absolute before:w-7 before:h-7 before:border before:border-black before:bg-paper before:rotate-45 before:-top-3.5 before:left-3
                      after:content-[''] after:absolute after:w-7 after:h-7 after:border after:border-black after:bg-paper after:rotate-45 after:-top-3.5 after:right-3">
        <div class="inline-block mb-3 bg-[#efe7d6] border-2 border-black px-2 py-1 font-extrabold uppercase tracking-[.06em] text-sm">
          Sustainable by design — what you eat on returns to the earth.
        </div>

        <div class="grid gap-5 lg:grid-cols-[minmax(300px,560px)_1fr]">
          <div>
            <video class="w-full aspect-video border border-black shadow-[4px_4px_0_rgba(0,0,0,.12)] bg-black
                         [filter:grayscale(25%)_contrast(108%)] hover:[filter:none]" autoplay loop muted playsinline preload="auto"
              poster="{{ asset('assets/palm-video-poster.jpg') }}" controlslist="nodownload noplaybackrate noremoteplayback nofullscreen"
              disablepictureinpicture>
              <source src="{{ asset('assets/itz-delhi-sustainability.webm') }}" type="video/webm" />
              <source src="{{ asset('images/videosus.mp4') }}" type="video/mp4" />
              <track kind="captions" srclang="en" src="{{ asset('assets/itzdelhi-captions.vtt') }}" label="English" />
              Sorry, your browser can’t play this video.
            </video>

            <p class="text-sm text-ink2 mt-2">
              A short on why we plate on areca palm-leaf dishes — compostable, chemical-free, beautifully grained.
            </p>
          </div>

          <div class="mt-1">
            <p>
              We plate on palm-leaf (areca) dishes that biodegrade in weeks — no plastic, no coating.
              From kitchen to soil with minimal waste.
            </p>

            <ul class="mt-3 grid gap-2">
              <li class="pl-6 relative">
                <span class="absolute left-0 top-0 font-extrabold text-accent2">✓</span>
                100% compostable &amp; food-safe
              </li>
              <li class="pl-6 relative">
                <span class="absolute left-0 top-0 font-extrabold text-accent2">✓</span>
                Microwave-friendly
              </li>
              <li class="pl-6 relative">
                <span class="absolute left-0 top-0 font-extrabold text-accent2">✓</span>
                Each piece uniquely grained — like vintage newsprint
              </li>
            </ul>
          </div>
        </div>
      </article>
    </div>
  </section>

  {{-- ===== Reserve (this is the section posters clip to) ===== --}}
  <section id="reserve" class="reserve-clip show-posters relative z-20 py-14">
    <div class="mx-auto max-w-[1180px] px-5 text-center">
      <h2 class="font-slab text-[clamp(1.5rem,3.2vw,2.25rem)]">Reserve • बुकिंग</h2>
      <p class="italic text-ink2 mt-1">“देर आए दुरुस्त आए”—walk-ins welcome, booking is बेहतर.</p>
    </div>

    <form class="mx-auto max-w-[1180px] px-5 mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
      <label class="font-bold flex flex-col gap-1">
        Name
        <input class="border border-black/50 bg-white px-3 py-3" type="text" name="name" required />
      </label>

      <label class="font-bold flex flex-col gap-1">
        Email
        <input class="border border-black/50 bg-white px-3 py-3" type="email" name="email" required />
      </label>

      <label class="font-bold flex flex-col gap-1">
        Phone
        <input class="border border-black/50 bg-white px-3 py-3" type="tel" name="phone" inputmode="tel" />
      </label>

      <label class="font-bold flex flex-col gap-1">
        Date
        <input class="border border-black/50 bg-white px-3 py-3" type="date" name="date" required />
      </label>

      <label class="font-bold flex flex-col gap-1">
        Time
        <input class="border border-black/50 bg-white px-3 py-3" type="time" name="time" required />
      </label>

      <label class="font-bold flex flex-col gap-1">
        Party Size
        <input class="border border-black/50 bg-white px-3 py-3" type="number" name="size" min="1" max="20" value="2" />
      </label>

      <label class="font-bold flex flex-col gap-1 sm:col-span-2 lg:col-span-3">
        Notes
        <textarea class="border border-black/50 bg-white px-3 py-3" name="notes" rows="3" placeholder="Allergies, high-chair, birthdays…"></textarea>
      </label>

      <button class="justify-self-start border border-black/50 bg-[#f7f3ea] px-5 py-3 font-bold uppercase tracking-[.06em]
                     [clip-path:polygon(0_0,calc(100%_-_16px)_0,100%_50%,calc(100%_-_16px)_100%,0_100%)]" type="submit">
        Confirm Request
      </button>

      <p class="text-sm text-black/70 sm:col-span-2 lg:col-span-3">
        Allergen info available on request. Optional 12.5% service charge goes to staff.
      </p>
    </form>
  </section>

  {{-- ===== Map ===== --}}
  <section id="find-us" class="show-posters relative z-20 py-12">
    <div class="mx-auto max-w-[1180px] px-5">
      <header>
        <h2 class="font-slab text-[clamp(1.4rem,3.2vw,2.25rem)]">Find Us • Map</h2>
        <p class="italic text-ink2 mt-1">Lights, camera, samosa — see you in Doncaster.</p>
      </header>

      <div class="mt-6 text-center">
        <div class="mx-auto w-full max-w-[980px]">
          <div class="inline-block px-6 py-3 text-white border-[3px] border-black
                      bg-gradient-to-b from-accent to-[#8f1e23]
                      rounded-[999px] rounded-b-none
                      font-slab text-[clamp(1.1rem,2.6vw,1.75rem)] tracking-[.06em]
                      shadow-[0_1px_0_rgba(0,0,0,.35)] relative">
            NOW SHOWING • ITZ DELHI
            <div class="absolute left-2 right-2 -bottom-2 h-2
                        [background:radial-gradient(circle,#ffd875_40%,#c79a2b_41%_62%,transparent_63%)]
                        [background-size:20px_10px] [background-repeat:repeat-x]"></div>
          </div>
          <div class="font-bold mt-3">1 Priory Walk, DN1 1TR, Doncaster</div>
        </div>

        <div class="relative mx-auto mt-4 w-full max-w-[980px] overflow-hidden rounded-2xl
                    border-4 border-black bg-white shadow-ink2
                    [box-shadow:10px_10px_0_rgba(0,0,0,.12),0_0_0_6px_rgba(0,0,0,.06)_inset]">
          <div class="pointer-events-none absolute -top-3 left-[-8px] right-[-8px] h-5
                      [background:radial-gradient(circle,#ffd875_40%,#c79a2b_41%_62%,transparent_63%)]
                      [background-size:24px_24px] [background-repeat:repeat-x]"></div>
          <div class="pointer-events-none absolute -bottom-3 left-[-8px] right-[-8px] h-5
                      [background:radial-gradient(circle,#ffd875_40%,#c79a2b_41%_62%,transparent_63%)]
                      [background-size:24px_24px] [background-repeat:repeat-x] [transform:scaleY(-1)]"></div>

          <div class="pointer-events-none absolute -left-3 top-[-8px] bottom-[-8px] w-5
                      [background:radial-gradient(circle,#ffd875_40%,#c79a2b_41%_62%,transparent_63%)]
                      [background-size:24px_24px] [background-repeat:repeat-y]"></div>
          <div class="pointer-events-none absolute -right-3 top-[-8px] bottom-[-8px] w-5
                      [background:radial-gradient(circle,#ffd875_40%,#c79a2b_41%_62%,transparent_63%)]
                      [background-size:24px_24px] [background-repeat:repeat-y] [transform:scaleX(-1)]"></div>

          <iframe class="w-full aspect-video border-0"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2371.9573257948296!2d-1.1337343!3d53.522819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48790db40b7bced9%3A0x8e3cc343a8fa91b4!2sITZ%20DELHI!5e0!3m2!1sen!2sin!4v1756026933899!5m2!1sen!2sin"
            title="Map: ITZ DELHI, 1 Priory Walk, DN1 1TR, Doncaster" loading="lazy" allowfullscreen
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class="mt-4">
          <a class="inline-block bg-[#efe7d6] border-2 border-black px-5 py-3 font-bold uppercase tracking-[.06em]
                    rotate-[-1deg] shadow-[2px_2px_0_rgba(0,0,0,1)]"
            href="https://www.google.com/maps/dir/?api=1&destination=ITZ+DELHI,+1+Priory+Walk,+DN1+1TR,+Doncaster" target="_blank" rel="noopener">
            Get Directions
          </a>
          <p class="text-sm text-ink2 mt-2">Central Doncaster • parking nearby</p>
        </div>
      </div>
    </div>
  </section>

  {{-- ===== Footer ===== --}}
  <footer class="relative z-20 mt-7 bg-[#efe8d9] py-8">
    <div class="mx-auto max-w-[1180px] px-5 grid gap-6 md:grid-cols-2 lg:grid-cols-[2fr_1fr_1fr]">
      <div>
        <h4 class="font-slab text-lg">Itz Delhi</h4>
        <p class="mt-1">“अतिथि देवो भवः” — We cook, you smile.</p>
        <p class="mt-1">123 High Street, Doncaster DN1 · +44 0000 000000</p>
      </div>

      <div>
        <h4 class="font-slab text-lg">Hours</h4>
        <p class="mt-1">Mon–Thu 12–22 • Fri–Sat 12–23 • Sun 12–21</p>
      </div>

      <div>
        <h4 class="font-slab text-lg">Follow</h4>
        <p class="mt-1">@itzdelhi (IG) • /itzdelhi (FB)</p>
        <a class="inline-block mt-2 bg-white border-2 border-black px-5 py-3 font-bold uppercase tracking-[.06em]
                  rotate-[-1deg] shadow-[2px_2px_0_rgba(0,0,0,1)]" href="#reserve">
          BOOK A TABLE
        </a>
      </div>
    </div>

    <p class="text-center text-sm text-black/80 mt-6">
      © 2025 Itz Delhi. “सादा जीवन, उच्च विचार”—and superb food.
    </p>
  </footer>

  <script>
    // =========================
    // Carousel (Specials)
    // =========================
    (function () {
      const carousel = document.querySelector('.carousel');
      if (!carousel) return;

      const track = carousel.querySelector('.track');
      const slides = Array.from(track.querySelectorAll('.slide'));
      const prevBtn = carousel.querySelector('.prev');
      const nextBtn = carousel.querySelector('.next');
      const dots = Array.from(carousel.querySelectorAll('.dot'));

      let index = 0;
      const autoplay = carousel.dataset.autoplay === 'true';
      const interval = Number(carousel.dataset.interval || 5000);
      let timer = null;

      function goTo(i) {
        index = (i + slides.length) % slides.length;
        track.style.transform = `translateX(-${index * 100}%)`;

        dots.forEach((d, di) => {
          d.classList.toggle('is-active', di === index);
          d.classList.toggle('bg-black', di === index);
          d.classList.toggle('bg-white', di !== index);
          d.setAttribute('aria-selected', di === index ? 'true' : 'false');
        });
      }

      function start() {
        if (!autoplay) return;
        stop();
        timer = setInterval(() => goTo(index + 1), interval);
      }

      function stop() {
        if (timer) clearInterval(timer);
        timer = null;
      }

      prevBtn?.addEventListener('click', () => { goTo(index - 1); start(); });
      nextBtn?.addEventListener('click', () => { goTo(index + 1); start(); });

      dots.forEach((dot) => {
        dot.addEventListener('click', () => {
          const i = Number(dot.dataset.index || 0);
          goTo(i);
          start();
        });
      });

      carousel.addEventListener('mouseenter', stop);
      carousel.addEventListener('mouseleave', start);

      goTo(0);
      start();
    })();

    // =========================
    // Floating posters: clip to Reserve section
    // =========================
    (function () {
  const layer = document.getElementById('floating-posters');
  const startEl = document.getElementById('reserve');
  const endEl = document.getElementById('find-us'); // map section id
  if (!layer || !startEl || !endEl) return;

  const posters = Array.from(layer.children).filter(el => el.id && el.id.startsWith('poster'));
  const drift = posters.map(() => ({
    x: (Math.random() * 2 - 1) * 10,
    y: (Math.random() * 2 - 1) * 10,
    s: 0.6 + Math.random() * 0.8,
    t: Math.random() * 1000
  }));

  function clamp(n, a, b) { return Math.max(a, Math.min(b, n)); }

  function updateClip() {
    const vh = window.innerHeight;
    const scrollY = window.scrollY || window.pageYOffset;

    // document positions (absolute)
    const startTop = startEl.getBoundingClientRect().top + scrollY;
    const endBottom = endEl.getBoundingClientRect().bottom + scrollY;

    const vpTop = scrollY;
    const vpBottom = scrollY + vh;

    // visible if viewport intersects the combined band
    const visible = vpBottom > startTop && vpTop < endBottom;
    layer.style.opacity = visible ? '1' : '0';
    if (!visible) return;

    // clip to the part of the combined band that is currently inside the viewport
    const topInVh = clamp(startTop - scrollY, 0, vh);
    const bottomInVh = clamp(endBottom - scrollY, 0, vh);

    layer.style.clipPath = `inset(${topInVh}px 0px ${vh - bottomInVh}px 0px)`;
  }

  function animate(ts) {
    posters.forEach((p, i) => {
      const d = drift[i];
      const dx = Math.sin((ts + d.t) / 1200) * d.x * d.s;
      const dy = Math.cos((ts + d.t) / 1500) * d.y * d.s;
      p.style.transform = `translate(${dx}px, ${dy}px)`;
    });
    requestAnimationFrame(animate);
  }

  window.addEventListener('scroll', updateClip, { passive: true });
  window.addEventListener('resize', updateClip);

  updateClip();
  requestAnimationFrame(animate);
})();

    (function () {
    const root = document.getElementById('menu-accordion');
    if (!root) return;

    const blocks = Array.from(root.querySelectorAll('.menu-block'));

    function setOpen(block, open) {
      const btn = block.querySelector('.acc-btn');
      const arrow = block.querySelector('.acc-arrow');
      const panelId = btn?.getAttribute('aria-controls');
      const panel = panelId ? document.getElementById(panelId) : null;

      if (!btn || !panel) return;

      btn.setAttribute('aria-expanded', open ? 'true' : 'false');

      // Tailwind visibility control
      panel.classList.toggle('hidden', !open);

      // Arrow symbol
      if (arrow) arrow.textContent = open ? '▾' : '▸';
    }

    // init (first open only)
    blocks.forEach((b) => {
      const open = b.dataset.defaultOpen === 'true';
      setOpen(b, open);
    });

    // toggle on click
    blocks.forEach((block) => {
      const btn = block.querySelector('.acc-btn');
      if (!btn) return;

      btn.addEventListener('click', () => {
        const isOpen = btn.getAttribute('aria-expanded') === 'true';
        setOpen(block, !isOpen);
      });
    });
  })();
  </script>
</body>

</html>