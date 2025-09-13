@if (session('fail'))
    <div id="flash-message"
        class="fixed top-5 right-5 z-50 px-6 py-3 rounded-xl bg-[#C32F27] text-white text-lg font-semibold shadow-lg opacity-0 transform translate-y-[-20px] transition-all duration-500">
        {{ session('fail') }}
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const flash = document.getElementById("flash-message");

            setTimeout(() => {
                flash.classList.remove("opacity-0", "translate-y-[-20px]");
                flash.classList.add("opacity-100", "translate-y-0");
            }, 100);

            setTimeout(() => {
                flash.classList.remove("opacity-100", "translate-y-0");
                flash.classList.add("opacity-0", "translate-y-[-20px]");
                setTimeout(() => flash.remove(), 500);
            }, 3000);
        });
    </script>
@endif

@if (session('success'))
    <div id="flash-message"
        class="fixed top-5 right-5 z-50 px-6 py-3 rounded-xl bg-[#4BC6B9] text-white text-lg font-semibold shadow-lg opacity-0 transform translate-y-[-20px] transition-all duration-500">
        {{ session('success') }}
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const flash = document.getElementById("flash-message");

            setTimeout(() => {
                flash.classList.remove("opacity-0", "translate-y-[-20px]");
                flash.classList.add("opacity-100", "translate-y-0");
            }, 100);

            setTimeout(() => {
                flash.classList.remove("opacity-100", "translate-y-0");
                flash.classList.add("opacity-0", "translate-y-[-20px]");
                setTimeout(() => flash.remove(), 500);
            }, 3000);
        });
    </script>
@endif