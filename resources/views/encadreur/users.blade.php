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
                   @foreach ($doctorants as $doctorant)
                      <!-- Message -->
                    <a id="myDiv" href="{{ route('encadreur.messages.show', $doctorant->id) }}" class="d-flex align-items-center">
                        <div class="mail-contnet">
                            <h5 class="mb-0">{{ $doctorant->user->name }}</h5> 
                            <span
                                class="mail-desc">{{ $doctorant->user->email }}</span>
                        </div>
                    </a> 
                   @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>