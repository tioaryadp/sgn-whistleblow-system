@extends('back.back-master')

@section('judul_halaman', 'Master Data')

@section('back-konten')

<div class="dashboard-content" style="width: 100%;">
    <div class="row" style="margin-top: 24px;">
        <a href="/kota" style="width: 20%;">
            <div class="column" style="float: left; width: 100%;">
                <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 font-medium group">
                    <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                        <div><i style="font-size: 2rem;" class='bx bxs-city'></i></div>
                    </div>
                    <div class="text-right">
                        <p>Data Kota</p>
                    </div>
                </div>
            </div>
        </a>
        <a href="/provinsi" style="width: 20%;">
            <div class="column" style="float: left; width: 100%;">
                <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 font-medium group">
                    <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                        <div><i style="font-size: 2rem;" class='bx bxs-landmark'></i></div>
                    </div>
                    <div class="text-right">
                        <p>Data Provinsi</p>
                    </div>
                </div>
            </div>
        </a>
        <a href="/kategori" style="width: 20%;">
            <div class="column" style="float: left; width: 100%;">
                <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 font-medium group">
                    <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                        <div><i style="font-size: 2rem;" class='bx bxs-category'></i></div></div>
                    <div class="text-right">
                        <p>Data Kategori</p>
                    </div>
                </div>
            </div>
        </a>
        <a href="/unit" style="width: 20%;">
            <div class="column" style="float: left; width: 100%;">
                <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 font-medium group">
                    <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                        <div><i style="font-size: 2rem;" class='bx bxs-factory'></i></div></div>
                    <div class="text-right">
                        <p>Data Unit</p>
                    </div>
                </div>
            </div>
        </a>
        <a href="/bagian" style="width: 20%;">
            <div class="column" style="float: left; width: 100%;">
                <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 font-medium group">
                    <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                        <div><i style="font-size: 2rem;" class='bx bxs-group'></i></div></div>
                    <div class="text-right">
                        <p>Data Bagian</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="row" style="margin-top: 24px;">
        <a href="/email-setting" style="width: 20%;">
            <div class="column" style="float: left; width: 100%;">
                <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 font-medium group">
                    <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                        <div><i style="font-size: 2rem;" class='bx bxs-envelope'></i></div></div>
                    <div class="text-right">
                        <p>Setting Email</p>
                    </div>
                </div>
            </div>
        </a>
        <a href="/sosmed" style="width: 20%;">
            <div class="column" style="float: left; width: 100%;">
                <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 font-medium group">
                    <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                        <div><i style="font-size: 2rem;" class='bx bxs-user-account'></i></div></div>
                    <div class="text-right">
                        <p>Social Media</p>
                    </div>
                </div>
            </div>
        </a>
        <a href="/faq-list" style="width: 20%;">
            <div class="column" style="float: left; width: 100%;">
                <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 font-medium group">
                    <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                        <div><i style="font-size: 2rem;" class='bx bxs-message-rounded-dots'></i></div></div>
                    <div class="text-right">
                        <p>FAQ</p>
                    </div>
                </div>
            </div>
        </a>
        <a href="/kebijakan-pdf" style="width: 20%;">
            <div class="column" style="float: left; width: 100%;">
                <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 font-medium group">
                    <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                        <div><i style="font-size: 2rem;" class='bx bxs-file-pdf'></i></div></div>
                    <div class="text-right">
                        <p>PDF Kebijakan</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>

@endsection