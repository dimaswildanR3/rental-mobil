<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>{{App\Setting::where('slug','nama-toko')->get()->first()->description}} 
            </span>
        </div>
    </div>
</footer>
<!-- End of Footer -->
