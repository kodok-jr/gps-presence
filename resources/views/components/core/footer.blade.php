<footer class="footer mt-auto">
    <div class="copyright bg-white">
        <p>
            &copy; <span id="copy-year">{{ date("Y") }}</span> Copyright Sleek Dashboard by
            <a class="text-primary" href="http://www.iamabdus.com/" target="_blank">kodokjr</a>.
        </p>
    </div>
    <script>
        var d = new Date();
        var year = d.getFullYear();
        document.getElementById("copy-year").innerHTML = year;
    </script>
</footer>
