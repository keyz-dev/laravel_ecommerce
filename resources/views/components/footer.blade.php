<footer class="w-screen bg-primary opacity-95 text-white py-3">
    <div class="footer flex flex-col container p-4 pt-0 md:p-0 gap-5 h-full">
        <section class="flex flex-col md:flex-row gap-4 md:gap-auto items-start md:items-center justify-between h-full">
            <div class="flex gap-[10px] flex-col">
                <div class="w-full place-items-center sm:place-items-start">
                    <x-logo :logo="$logo" />
                </div>
                <div class="flex gap-1">
                    <ul class="grid grid-cols-3 sm:grid-cols-5 gap-8">
                        <li><a class="text-nowrap" href="#">Home</a></li>
                        <li><a class="text-nowrap" href="#">About</a></li>
                        <li><a class="text-nowrap" href="#">Services</a></li>
                        <li><a class="text-nowrap" href="#">Contact</a></li>
                        <li><a class="text-nowrap" href="#">Know More</a></li>
                    </ul>
                </div>
            </div>
            <hr class="w-full sm:hidden border border-gray-300">
            <form class="flex-2" action="">
                <div class="flex items-end gap-[10px] h-full w-full justify-center">
                    <div>
                        <label for="newsletter">Join Our Newsletter</label>
                        <x-input
                            type="email"
                            id="newsletter"
                            name="newsletter"
                            placeholder="Newsletter"
                            class="border-slate-400 placeholder:text-sm mt-2"
                        />
                    </div>
                    <x-button 
                        type="submit"
                        text="Subscribe"
                        class="btn-primarybtn"    
                    />
                </div>
            </form>
        </section>
        <hr class="border border-gray-300">
        <section class="flex flex-col sm:flex-row items-start sm:items-center text-gray-400 text-sm justify-between gap-2 sm:gap-auto">
            <p>&copy; 2022 My Website. All rights reserved.</p>
            <p>
                <a href="#">Privacy</a>
                <a href="#">Terms &amp; Conditions</a>
            </p>
            <p>Powered by <a href="https://www.google.com/">Google</a></p>
        </section>
    </div>
</footer>