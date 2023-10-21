@extends('back.appback')
@section('title', "Soumission d'une activité")
@section('content')

<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Formulaire de soumission d'une activité</h3>
            <div class="d-flex align-items-center">
            </div>
        </div>
        <div class="col-md-6 col-4 align-self-center">
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('doctorant.submitted_activity', $activity->id) }}" class="form-horizontal form-material mx-2" enctype="multipart/form-data">
                        @csrf
                        <?php $daysTime = $activity->remainingTime(); ?>
                        <div class="form-group">
                            <label style="font-size: 25px;" class="col-md-12 mb-0 lead">Intitulé : {{ $activity->title }}</label>
                            <label style="font-size: 20px;"  class="col-md-12 mb-0 lead">Semestre : {{ $activity->semestre }}</label>
                            <label style="font-size: 20px;" class="col-md-12 mb-0 lead">Date limite :  {{ $daysTime }} - {{ $activity->calculateDeadline() }}</label>
                        </div>

                        <div class="form-group">
                            <label style="font-size: 20px;" class="col-md-12 mb-0 lead">Description :</label>
                            <div class="col-md-12">
                                <p class="lead">{{ $activity->description }}</p>
                            </div>
                            <span  class="alert-danger">@error("description"){{ $message }}@enderror</span>

                            <label style="font-size: 20px;" for="files" class="col-md-12 mb-0 lead">Sélectionnez des fichiers</label>
                            <input type="file" name="files[]" id="files" class="form-control ps-0 form-control-line"  multiple="" required>
                            <span class="alert-danger">@error("files"){{ $message }}@enderror</span>
                            <div id="fileList"></div>
                        </div>

                        <div class="form-group">
                            <label style="font-size: 20px;" for="comment" class="col-md-12 mb-0 lead">Commentaire</label>
                            <textarea name="comment" id="comment" required rows="4" required
                                    class="form-control ps-0 form-control-line" placeholder="Votre commentaire">{{ isset($activity->comment) ? $activity->comment : old('comment') }}
                            </textarea>
                            <span  class="alert-danger">@error("comment"){{ $message }}@enderror</span>
                        </div>

                      
                        <button type="submit" class="btn btn-info mx-auto mx-md-0 text-white">Soumettre</button>
                    </form>
                </div>
            </div>
        </div>
    </div>           
</div> 
{{-- <script>
    function resizeAndPreview(file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = new Image();
            img.src = e.target.result;
            
            img.onload = function() {
                const canvas = document.createElement('canvas');
                const ctx = canvas.getContext('2d');
                const maxWidth = 200; // La largeur maximale souhaitée en pixels
                
                let newWidth, newHeight;
                if (img.width > maxWidth) {
                    newWidth = maxWidth;
                    newHeight = (img.height * maxWidth) / img.width;
                } else {
                    newWidth = img.width;
                    newHeight = img.height;
                }
                
                canvas.width = newWidth;
                canvas.height = newHeight;
                ctx.drawImage(img, 0, 0, newWidth, newHeight);
                
                const preview = document.createElement('img');
                preview.src = canvas.toDataURL('image/jpeg', 0.7); // Vous pouvez ajuster la qualité ici
                preview.alt = 'Aperçu du fichier';
                
                const fileListContainer = document.getElementById('fileList');
                fileListContainer.appendChild(preview);
                
                // Stockez le fichier temporairement dans la session
                sessionStorage.setItem(`tempFile_${i}`, preview.src);
            };
            
            img.src = e.target.result;
        };
        
        reader.readAsDataURL(file);
    }
    document.getElementById('files').addEventListener('change', function(event) {
        const fileList = event.target.files;
        const fileListContainer = document.getElementById('fileList');
        fileListContainer.innerHTML = '';

        for (let i = 0; i < fileList.length; i++) {
            const file = fileList[i];
            resizeAndPreview(file, i);
        }
    });
</script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mammoth/1.6.0/mammoth.browser.min.js"></script>
<script>
    document.getElementById('files').addEventListener('change', function(event) {
        const fileList = event.target.files;
        const fileListContainer = document.getElementById('fileList');
        fileListContainer.innerHTML = '';

        for (let i = 0; i < fileList.length; i++) {
            const file = fileList[i];
            if (file.type === 'application/pdf') {
                // Pour les fichiers PDF
                const reader = new FileReader();
                reader.onload = function(e) {
                    const pdfData = new Uint8Array(e.target.result);
                    const fileReader = new FileReader();
                    
                    pdfjsLib.getDocument({data: pdfData}).promise.then(pdf => {
                        pdf.getPage(1).then(page => {
                            const canvas = document.createElement('canvas');
                            const context = canvas.getContext('2d');
                            const viewport = page.getViewport({scale: 1});
                            canvas.width = viewport.width;
                            canvas.height = viewport.height;
                            const renderContext = {
                                canvasContext: context,
                                viewport: viewport,
                            };
                            page.render(renderContext).promise.then(() => {
                                const pdfPreview = document.createElement('img');
                                pdfPreview.src = canvas.toDataURL();
                                fileListContainer.appendChild(pdfPreview);
                            });
                        });
                    });
                };
                reader.readAsArrayBuffer(file);
            } else if (file.type === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document') {
                // Pour les fichiers Word (DOCX)
                const reader = new FileReader();
                reader.onload = function(e) {
                    const arrayBuffer = e.target.result;
                    const blob = new Blob([new Uint8Array(arrayBuffer)], { type: 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' });

                    mammoth.convertToHtml({arrayBuffer: blob,  ignoreEmptyParagraphs: true}).then(result => {
                        const wordPreview = document.createElement('div');
                        wordPreview.innerHTML = result.value;
                        fileListContainer.appendChild(wordPreview);
                    });
                };
                reader.readAsArrayBuffer(file);
            } else if(file.type.startsWith('image/')){
                    // Pour les fichiers d'image
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = new Image();
                    img.src = e.target.result;

                    img.onload = function() {
                        const maxWidth = 200; // Largeur maximale souhaitée en pixels

                    let newWidth, newHeight;
                        if (img.width > maxWidth) {
                            newWidth = maxWidth;
                            newHeight = (img.height * maxWidth) / img.width;
                        } else {
                            newWidth = img.width;
                            newHeight = img.height;
                        }

                        const canvas = document.createElement('canvas');
                        const context = canvas.getContext('2d');
                        canvas.width = newWidth;
                        canvas.height = newHeight;
                        context.drawImage(img, 0, 0, newWidth, newHeight);

                        const imgPreview = document.createElement('img');
                        imgPreview.src = canvas.toDataURL('image/jpeg', 0.7); // Vous pouvez ajuster la qualité ici
                        fileListContainer.appendChild(imgPreview);
                    };
                };
                reader.readAsDataURL(file);
            }
            else {
                // Pour les autres types de fichiers, par exemple, images
                
            }
        }
    });
</script>
@endsection
