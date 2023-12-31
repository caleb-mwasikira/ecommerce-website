@props([
    'media' => null,
])

<div x-data="imageViewer('{{ $media?->file_path ?? '' }}')" class="flex items-center justify-center w-full md:w-1/2 sm:mx-8 md:mx-0 my-10">
    <label for="dropzone-file"
        class="flex flex-col items-center justify-center px-8 h-96 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">

        <div class="flex flex-col items-center justify-center pt-5 pb-6">
            <template x-if="!imageUrl" class="w-64">
                <div>
                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                    </svg>
                </div>
            </template>

            <template x-if="imageUrl" class="w-48 px-4">
                <div class="w-full h-64">
                    <img x-bind:src="imageUrl" alt="Product Cover Photo" srcset=""
                        class="rounded-lg w-full h-full object-cover object-center">
                </div>
            </template>

            <p class="my-2 text-sm text-gray-500 dark:text-gray-400">
                <span class="font-semibold">Click to upload</span>
            </p>
            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
        </div>
        <input x-on:change="fileChosen" id="dropzone-file" type="file" class="hidden" />
    </label>
</div>


@pushOnce('scripts')
    <script>
        function imageViewer(src = '') {
            return {
                imageUrl: src,

                fileChosen(event) {
                    this.fileToDataUrl(event, src => this.imageUrl = src)
                },

                fileToDataUrl(event, callback) {
                    if (!event.target.files.length) return

                    let file = event.target.files[0],
                        reader = new FileReader()

                    reader.readAsDataURL(file)
                    reader.onload = e => callback(e.target.result)
                },
            }
        }
    </script>
@endPushOnce
