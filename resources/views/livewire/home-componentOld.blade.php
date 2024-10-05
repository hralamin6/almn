<div x-data="user()">
    <div class="p-4">
        <div class="color-box bg-primary">Primary Color</div>
        <div class="color-box bg-primary-50">Primary 50</div>
        <div class="color-box bg-primary-100">Primary 100</div>
        <div class="color-box bg-primary-light">Primary Light</div>
        <div class="color-box bg-primary-lighter">Primary Lighter</div>
        <div class="color-box bg-primary-dark">Primary Dark</div>
        <div class="color-box bg-primary-darker">Primary Darker</div>

        <!-- Color Picker to change color -->
        <div class="p-4">
            <h2 class="text-xl font-bold mb-4">Select Primary Color:</h2>

            <!-- Color Picker Component -->
            <div class="flex space-x-3">
                <div @click="setColors('rgba(76, 175, 80, 1)')" class="w-10 h-10 rounded-full bg-green-500 cursor-pointer border-2 border-transparent hover:border-gray-300"></div>
                <div @click="setColors('rgba(33, 150, 243, 1)')" class="w-10 h-10 rounded-full bg-blue-500 cursor-pointer border-2 border-transparent hover:border-gray-300"></div>
                <div @click="setColors('rgba(244, 67, 54, 1)')" class="w-10 h-10 rounded-full bg-red-500 cursor-pointer border-2 border-transparent hover:border-gray-300"></div>
                <div @click="setColors('rgba(255, 235, 59, 1)')" class="w-10 h-10 rounded-full bg-yellow-500 cursor-pointer border-2 border-transparent hover:border-gray-300"></div>
                <div @click="setColors('rgba(255, 87, 34, 1)')" class="w-10 h-10 rounded-full bg-orange-500 cursor-pointer border-2 border-transparent hover:border-gray-300"></div>
                <div @click="setColors('rgba(156, 39, 176, 1)')" class="w-10 h-10 rounded-full bg-purple-500 cursor-pointer border-2 border-transparent hover:border-gray-300"></div>
                <div @click="setColors('rgba(121, 85, 72, 1)')" class="w-10 h-10 rounded-full bg-brown-500 cursor-pointer border-2 border-transparent hover:border-gray-300"></div>
                <div @click="setColors('rgba(63, 81, 181, 1)')" class="w-10 h-10 rounded-full bg-indigo-500 cursor-pointer border-2 border-transparent hover:border-gray-300"></div>
                <div @click="setColors('rgba(3, 169, 244, 1)')" class="w-10 h-10 rounded-full bg-lightblue-500 cursor-pointer border-2 border-transparent hover:border-gray-300"></div>
                <div @click="setColors('rgba(0, 188, 212, 1)')" class="w-10 h-10 rounded-full bg-cyan-500 cursor-pointer border-2 border-transparent hover:border-gray-300"></div>
                <div @click="setColors('rgba(0, 150, 136, 1)')" class="w-10 h-10 rounded-full bg-teal-500 cursor-pointer border-2 border-transparent hover:border-gray-300"></div>
                <div @click="setColors('rgba(255, 193, 7, 1)')" class="w-10 h-10 rounded-full bg-amber-500 cursor-pointer border-2 border-transparent hover:border-gray-300"></div>
                <div @click="setColors('rgba(205, 220, 57, 1)')" class="w-10 h-10 rounded-full bg-lime-500 cursor-pointer border-2 border-transparent hover:border-gray-300"></div>
                <div @click="setColors('rgba(139, 195, 74, 1)')" class="w-10 h-10 rounded-full bg-lightgreen-500 cursor-pointer border-2 border-transparent hover:border-gray-300"></div>
                <div @click="setColors('rgba(158, 158, 158, 1)')" class="w-10 h-10 rounded-full bg-gray-500 cursor-pointer border-2 border-transparent hover:border-gray-300"></div>
                <div @click="setColors('rgba(96, 125, 139, 1)')" class="w-10 h-10 rounded-full bg-bluegray-500 cursor-pointer border-2 border-transparent hover:border-gray-300"></div>
                <div @click="setColors('rgba(255, 255, 255, 1)')" class="w-10 h-10 rounded-full bg-white cursor-pointer border-2 border-transparent hover:border-gray-300"></div>
                <div @click="setColors('rgba(0, 0, 0, 1)')" class="w-10 h-10 rounded-full bg-black cursor-pointer border-2 border-transparent hover:border-gray-300"></div>
                <div @click="setColors('rgba(255, 111, 145, 1)')" class="w-10 h-10 rounded-full bg-pink-500 cursor-pointer border-2 border-transparent hover:border-gray-300"></div>
                <div @click="setColors('rgba(220, 53, 69, 1)')" class="w-10 h-10 rounded-full bg-crimson-500 cursor-pointer border-2 border-transparent hover:border-gray-300"></div>
            </div>
        </div>
    </div>
    <div class="space-y-4">
        <div class="flex items-center space-x-2">
            <label class="w-16 text-gray-800 dark:text-gray-200">Red:</label>
            <input type="range" min="0" max="255" x-model="red" class="w-full" @input="updateColor">
            <span class="text-gray-800 dark:text-gray-200" x-text="red"></span>
        </div>

        <div class="flex items-center space-x-2">
            <label class="w-16 text-gray-800 dark:text-gray-200">Green:</label>
            <input type="range" min="0" max="255" x-model="green" class="w-full" @input="updateColor">
            <span class="text-gray-800 dark:text-gray-200" x-text="green"></span>
        </div>

        <div class="flex items-center space-x-2">
            <label class="w-16 text-gray-800 dark:text-gray-200">Blue:</label>
            <input type="range" min="0" max="255" x-model="blue" class="w-full" @input="updateColor">
            <span class="text-gray-800 dark:text-gray-200" x-text=" blue"></span>
        </div>

        <div class="flex items-center space-x-2">
            <label class="w-16 text-gray-800 dark:text-gray-200">Alpha:</label>
            <input type="range" min="0" max="1" step="0.01" x-model="alpha" class="w-full" @input="updateColor">
            <span class="text-gray-800 dark:text-gray-200" x-text=" alpha"></span>
        </div>
    </div>

    <!-- Selected Color Preview -->
    <div class="mt-8 p-6 rounded-lg shadow-md text-center"
         :style="{ backgroundColor: 'rgba(' + red + ',' + green + ',' + blue + ',' + alpha + ')' }">
        <p class="text-lg font-semibold text-gray-800 dark:text-gray-200"
           x-text="'Selected Color: rgba(' + red + ',' + green + ',' + blue + ',' + alpha + ')'">
        </p>
    </div>

    <header class="text-center py-4 bg-blue-500 dark:bg-blue-700">
        <h1 class="text-3xl font-bold text-white">আরবি শব্দভান্ডার শেখার গুরুত্ব</h1>
    </header>

    <main class="container mx-auto px-4 py-8">
        <section class="mb-8">
            <h2 class="text-2xl text-gray-600 font-semibold dark:text-white">ভাষা দক্ষতা খুলে দেয় নতুন দিগন্ত</h2>
            <p class="text-lg text-gray-500 dark:text-gray-200">আপনি কি আরবি ভাষা শিখতে চান কিন্তু কোথা থেকে শুরু করবেন তা জানেন না? শব্দভান্ডারই হল ভাষা শেখার ভিত্তি। আরবি শব্দावली শেখার মাধ্যমে আপনি আরবি ভাষা দক্ষতা অর্জনে এগিয়ে যেতে পারবেন।</p>
        </section>

        <section class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="p-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-white">মৌলিক যোগাযোগ সহজ করে</h3>
                <p class="text-base text-gray-500 dark:text-gray-300">আরবি শব্দ জানা আপনাকে আরবি ভাষী মানুষের সাথে মৌলিক যোগাযোগ সহজ করে তোলে। আপনি সাধারণ শুভেচ্ছা, প্রশ্ন এবং মন্তব্য বিনিময় করতে পারবেন।</p>
            </div>
            <div class="p-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-white">আরবি সংস্কৃতি বোঝার কাঠি</h3>
                <p class="text-base text-gray-500 dark:text-gray-300">আরবি শব্দাবলি শেখার মাধ্যমে আপনি আরবি সাহিত্য, গান, চলচ্চিত্র এবং অন্যান্য সাংস্কৃতিক উৎসগুলো আরও ভালোভাবে বুঝতে পারবেন।</p>
            </div>
        </section>

        <section class="text-center mt-8">
            <a href="{{route('words')}}" wire:navigate class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700">আজই আরবি শব্দভান্ডার শেখা শুরু করুন!</a>
        </section>
    </main>

    <main class="p-6">
        <section class="mb-6">
            <h2 class="text-3xl font-semibold text-gray-600 dark:text-white">আরবি শব্দভান্ডার শেখার উপকারিতা</h2>
            <p class="mt-2 text-lg">
                আরবি ভাষা শেখার মাধ্যমে আপনি ইসলামী সংস্কৃতি ও ইতিহাসের গভীরে প্রবেশ করতে পারবেন। শব্দভান্ডার শেখার মাধ্যমে আপনার ভাষার দক্ষতা বৃদ্ধি পাবে এবং আপনি সহজেই যোগাযোগ করতে পারবেন।
            </p>
        </section>

        <section class="mb-6">
            <h2 class="text-3xl font-semibold text-gray-600 dark:text-white">নিয়মিত অনুশীলনের প্রয়োজনীয়তা</h2>
            <p class="mt-2 text-lg">
                নিয়মিত অনুশীলন শব্দভান্ডার শেখার জন্য অত্যন্ত গুরুত্বপূর্ণ। এটি নতুন শব্দ এবং বাক্যাংশগুলি মনে রাখতে সাহায্য করে এবং ভাষার দক্ষতা বাড়ায়।
            </p>
        </section>

        <section class="mb-6">
            <h2 class="text-3xl font-semibold text-gray-600 dark:text-white">আরবি শেখার জন্য সেরা প্রতিষ্ঠান</h2>
            <p class="mt-2 text-lg">
                আরবি শেখার জন্য <span class="font-bold">সিবাওয়েহ ইনস্টিটিউট</span> অন্যতম সেরা প্রতিষ্ঠান। তারা অত্যাধুনিক শিক্ষাদান পদ্ধতি ও বিস্তৃত পাঠ্যক্রমের মাধ্যমে শিক্ষার্থীদের শেখার অভিজ্ঞতাকে আরও আকর্ষণীয় ও ফলপ্রসূ করে তুলেছে।
            </p>
        </section>

        <section class="mb-6">
            <p class="mt-2 text-lg">
                সিবাওয়েহ ইনস্টিটিউটের কোর্সগুলো আপনাকে আরবি শব্দভান্ডার শেখার জন্য উপযুক্ত পরিবেশ এবং সঠিক নির্দেশনা প্রদান করে।
            </p>
        </section>
    </main>
    @script
    <script>
        Alpine.data('user', () => ({
            init() {

            },

                red: $persist(76),
                green: $persist(175),
                blue: $persist(80),
                alpha: $persist(1),

                initColors() {
                    // Initialize colors if necessary (you can load from localStorage, etc.)
                    this.updateColor();
                },

                updateColor() {
                    // This function updates the color as the sliders change
                    const color = `rgba(${this.red}, ${this.green}, ${this.blue}, ${this.alpha})`;
                    this.setColors(color)
                    // this.setBgColors(color)
                    // document.documentElement.style.setProperty('--color-primary', color);
                }
        }))

    </script>
    @endscript
</div>
