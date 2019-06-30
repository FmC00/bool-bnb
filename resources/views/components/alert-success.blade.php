<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session()->get('success'))
              <div class="alert alert-success">
                  {{ session()->get('success') }}
              </div>
            @endif
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Login avvenuto con successo!
                </div>
            </div>
        </div>
    </div>
</div>
