<!-- Column -->
<div class="col-lg-4 col-xlg-3">
                
    <!-- Column -->
    <div class="card">
        <div class="card-body bg-info">
            <h4 class="text-white card-title">Mes Messages</h4>
        </div>
        <div class="card-body">
            <div class="message-box contact-box">
                
                <div class="message-widget contact-widget">
                      <!-- Message -->
                    <a id="myDiv" href="{{ route('doctorant.messages.show', $encadreur->id) }}" class="d-flex align-items-center">
                        <div class="mail-contnet">
                            <h5 class="mb-0">{{ $encadreur->user->name }}</h5> 
                            <span
                                class="mail-desc">{{ $encadreur->user->email }}</span>
                        </div>
                    </a> 
                    
                </div>
            </div>
        </div>
    </div>
</div>