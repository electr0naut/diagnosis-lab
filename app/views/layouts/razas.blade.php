@include('base')
            <div class="row">
                <h2>Testing Grounds</h2>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    @yield('main')
                </div>

                <div class="col-md-6">
                    @yield('show')
                </div>
            </div>
        </div>
    </body>

</html>