@extends('back.appback')
@section('title', 'MessagesDoctorant')
@section('content')


   <div class="container-fluid">
        <div class="row">
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
                                <a href="#" class="d-flex align-items-center">
                                    <div class="mail-contnet">
                                        <h5 class="mb-0">{{ $encadreur->user->name }}</h5> <span
                                            class="mail-desc">{{ $encadreur->user->email }}</span>
                                    </div>
                                </a>
                                <!-- Message -->
                                <a href="#" class="d-flex align-items-center">
                                
                                    <div class="mail-contnet">
                                        <h5 class="mb-0">Arijit Sinh</h5> <span
                                            class="mail-desc">cruise1298.fiplip@gmail.com</span>
                                    </div>
                                </a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xlg-9">
                <div class="card">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs profile-tab" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#home"
                                role="tab">Activity</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="home" role="tabpanel">
                            <div class="card-body">
                                <div class="profiletimeline border-start-0">
                                    <div class="sl-item">
                                        <div class="sl-left"> <img src="../assets/images/users/3.jpg" alt="user"
                                                class="img-circle"> </div>
                                        <div class="sl-right">
                                            <div><a href="#" class="link">John Doe</a> <span class="sl-date">5
                                                    minutes ago</span>
                                                <p class="mt-2"> Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing elit. Integer nec odio. Praesent libero. Sed
                                                    cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh
                                                    elementum imperdiet. Duis sagittis ipsum. Praesent mauris.
                                                    Fusce nec tellus sed augue semper </p>
                                            </div>
                                            <div class="like-comm mt-3"> <a href="javascript:void(0)"
                                                    class="link me-2">2
                                                    comment</a> <a href="javascript:void(0)"
                                                    class="link me-2"><i class="fa fa-heart text-danger"></i>
                                                    5 Love</a> </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="sl-item">
                                        <div class="sl-left"> <img src="../assets/images/users/4.jpg" alt="user"
                                                class="img-circle"> </div>
                                        <div class="sl-right">
                                            <div><a href="#" class="link">John Doe</a> <span class="sl-date">5
                                                    minutes ago</span>
                                                <blockquote class="mt-2">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                    sed do eiusmod tempor incididunt
                                                </blockquote>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection