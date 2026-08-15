@props([
    'title' => '',
])

<div class="custom-card">
    @if($title)
        <div class="custom-card-header">
            <h3>{{ $title }}</h3>
        </div>
    @endif

    <div class="custom-card-body">
        {{ $slot }}
    </div>
</div>

<style>
.custom-card{
    background:#fff;
    border-radius:15px;
    padding:25px;
    margin:20px 0;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
    transition:all .3s ease;
    border-top:5px solid #667eea;
}

.custom-card:hover{
    transform:translateY(-5px);
    box-shadow:0 15px 35px rgba(102,126,234,.25);
}

.custom-card-header{
    margin-bottom:15px;
    padding-bottom:10px;
    border-bottom:2px solid #e9ecef;
}

.custom-card-header h3{
    margin:0;
    color:#667eea;
    font-size:1.5rem;
}

.custom-card-body{
    color:#555;
    line-height:1.8;
}

@media (max-width:768px){
    .custom-card{
        padding:20px;
    }

    .custom-card-header h3{
        font-size:1.3rem;
    }
}
</style>