@props(['buttonText'=>'Отправить','method'=>'POST'])
<form class="form" {{$attributes}} method="POST">
    @csrf
    @method($method)
    {{$slot}}
    <button type="submit" class="btn btn-primary">{{__($buttonText)}} </button>
</form>
