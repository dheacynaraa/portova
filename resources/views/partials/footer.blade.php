<footer style="background:#101C1D;border-top:1px solid #233637;margin-top:96px;">

    <div style="max-width:1280px;margin:auto;padding:56px 16px;">

        <div class="flex justify-between items-start gap-20">

            {{-- Logo & Deskripsi --}}
            <div class="w-[420px]">

                <h2 style="color:#DBFCFF;font-size:32px;font-weight:700;">
                    Portova
                </h2>

                <p style="color:#B9CACB;font-size:15px;line-height:28px;max-width:300px;">

                    Platform digital untuk mengeksplorasi karya,
                    inovasi, dan proyek terbaik mahasiswa Indonesia.
                    Temukan inspirasi dan bangun kolaborasi bersama
                    ekosistem Portova.

            </p>

            </div>

            {{-- Menu Cepat --}}
            <div class="w-[220px]">

                <h3 style="color:#DBFCFF;font-size:18px;font-weight:600;margin-bottom:20px;">

                    Menu Cepat

                </h3>

            <div>

            <div style="margin-bottom:14px;">
                <a href="{{ route('project.index') }}"
                style="color:#B9CACB;text-decoration:none;">
                    Eksplorasi
                </a>
            </div>

            <div style="margin-bottom:14px;">
                <a href="#"
                style="color:#B9CACB;text-decoration:none;transition:.3s;">
                    Tentang
                </a>
            </div>

            <div>
                <a href="#"
                style="color:#B9CACB;text-decoration:none;transition:.3s;">
                    Kontak
                </a>
            </div>

        </div>

            </div>

            {{-- Hubungi Kami --}}
            <div class="w-[280px]">

                <h3 style="color:#DBFCFF;font-size:18px;font-weight:600;margin-bottom:20px;">

                    Hubungi Kami

                </h3>

                <div class="space-y-3">

                    <p style="color:#B9CACB;">

                        <i class="fa-solid fa-envelope text-[#7DF4FF] mr-2"></i>

                        info@portova.id

                    </p>

                    <p style="color:#B9CACB;">

                        <i class="fa-solid fa-phone text-[#7DF4FF] mr-2"></i>

                        +62 812-3456-7890

                    </p>

                    <div class="flex gap-4 pt-2">

                        <a href="#"
                           class="w-10 h-10 rounded-full
                                  bg-[#192122]
                                  border border-[#3B494B]
                                  flex items-center justify-center
                                  text-[#7DF4FF]
                                  hover:bg-[#00F0FF]
                                  hover:text-[#0D1515]
                                  transition:.3s;">

                            <i class="fab fa-instagram"></i>

                        </a>

                        <a href="#"
                           class="w-10 h-10 rounded-full
                                  bg-[#192122]
                                  border border-[#3B494B]
                                  flex items-center justify-center
                                  text-[#7DF4FF]
                                  hover:bg-[#00F0FF]
                                  hover:text-[#0D1515]
                                  transition:.3s;">

                            <i class="fab fa-linkedin-in"></i>

                        </a>

                        <a href="#"
                           class="w-10 h-10 rounded-full
                                  bg-[#192122]
                                  border border-[#3B494B]
                                  flex items-center justify-center
                                  text-[#7DF4FF]
                                  hover:bg-[#00F0FF]
                                  hover:text-[#0D1515]
                                  transition:.3s;">

                            <i class="fab fa-github"></i>

                        </a>

                    </div>

                </div>

            </div>

        </div>

        {{-- Bottom Footer --}}
        <div class="mt-12 pt-6 border-t border-[#233637]">

            <p style="color:#849495;text-align:center;font-size:14px;">

                © {{ date('Y') }} Portova. All Rights Reserved.

            </p>

        </div>

    </div>

</footer>