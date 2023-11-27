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
                   @foreach ($users as $user)
                      <!-- Message -->
                    <a id="myDiv" href="{{ route('encadreur.messages.show', $user->id) }}" class="d-flex align-items-center">
                        <div class="mail-contnet">
                            
                            <h5 class="mb-0">{{ $user->name }} 
                            @if (isset($unread[$user->id]))
                            <span style="margin-left: 10px; border-radius : 50px; padding: 5px 5px; color:white; background-color: #1E88E5;">{{ $unread[$user->id] }}</span>
                            @endif
                            
                            </h5> 
                            <span class="mail-desc">{{ $user->email }}</span>
                        </div>
                    </a> 
                   @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>