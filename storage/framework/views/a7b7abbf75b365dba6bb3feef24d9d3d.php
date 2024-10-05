<div x-data="user()" class="relative">
    <div id="main" @mousemove="updateMouseCoordinates($event)" class="w-full h-screen bg-gradient-to-br from-pink-200 via-purple-300 to-indigo-400 relative overflow-hidden">
        <!-- Initial centered heart -->
        <span
            style="background-image: url('https://cdn4.iconfinder.com/data/icons/set-1/32/__1-1024.png');"
            class="w-24 h-24 bg-cover absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 animate-pulse">
        </span>
    </div>

        <?php
        $__scriptKey = '1673717669-0';
        ob_start();
    ?>
    <script>
        Alpine.data('user', () => ({
            x: 0,
            y: 0,

            // Function to update the mouse coordinates and create hearts dynamically
            updateMouseCoordinates(event) {
                this.x = event.clientX;
                this.y = event.clientY;

                // Create a new heart element
                const heartElement = document.createElement('span');
                heartElement.classList.add('absolute', 'transform', '-translate-x-1/2', '-translate-y-1/2', 'bg-cover', 'opacity-80', 'animate-fade-out');
                heartElement.style.backgroundImage = "url('https://cdn4.iconfinder.com/data/icons/set-1/32/__1-1024.png')";
                heartElement.style.width = `${Math.random() * 30 + 20}px`; // Random width for varying heart sizes
                heartElement.style.height = heartElement.style.width; // Make it square
                heartElement.style.left = `${this.x}px`;
                heartElement.style.top = `${this.y}px`;
                heartElement.style.pointerEvents = 'none'; // Prevent mouse interaction
                heartElement.style.transform += ` rotate(${Math.random() * 360}deg)`;
                heartElement.style.animationDuration = `${Math.random() * 1.5 + 0.5}s`;

                // Append the heart to the body
                document.body.appendChild(heartElement);

                // Remove the heart after the animation completes
                setTimeout(() => {
                    heartElement.remove();
                }, 1500);
            },
        }))
    </script>
    <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?>
    <style>
        @keyframes fadeOut {
            from {
                opacity: 1;
                transform: scale(1);
            }
            to {
                opacity: 0;
                transform: scale(1.5);
            }
        }

        .animate-fade-out {
            animation: fadeOut 1.5s forwards;
        }
    </style>
</div>
<?php /**PATH /home/hralamin/www/almn/resources/views/livewire/home-component.blade.php ENDPATH**/ ?>