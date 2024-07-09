@props(['id', 'options', 'selected'])

<div x-data="{ open: false, selected: @entangle($selected).defer }" @click.away="open = false">
    <div class="relative">
        <div class="flex items-center">
            <div class="relative">
                <div @click="open = !open" class="relative">
                    <div class="flex flex-wrap items-center">
                        <template x-for="(option, index) in @json($options)" :key="index">
                            <template x-if="selected.includes(option.id)">
                                <div class="flex items-center bg-blue-100 text-blue-800 m-1 p-1 rounded-lg">
                                    <span x-text="option.text" class="mr-1"></span>
                                    <button type="button" @click="selected = selected.filter(item => item !== option.id)">
                                        &#10005;
                                    </button>
                                </div>
                            </template>
                        </template>
                    </div>
                    <div x-show="open" class="absolute mt-1 w-full bg-white shadow-lg rounded-lg z-10">
                        <template x-for="(option, index) in @json($options)" :key="index">
                            <div class="flex items-center bg-gray-100 hover:bg-gray-200 cursor-pointer m-1 p-1 rounded-lg" @click="toggleSelection(option.id)">
                                <span x-text="option.text" class="mr-1"></span>
                                <template x-if="selected.includes(option.id)">
                                    &#10003;
                                </template>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" name="{{ $id }}" x-bind:value="JSON.stringify(selected)">
</div>

<script>
    function toggleSelection(id) {
        let selected = @this.get('selected');

        if (selected.includes(id)) {
            selected = selected.filter(item => item !== id);
        } else {
            selected.push(id);
        }

    @this.set('selected', selected);
    }
</script>
