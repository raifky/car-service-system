@extends('layouts.main')
@section('content')
<div class="visible-print text-center">
    {!! QrCode::size(125)->format('svg')->generate(route('forminputservice', ['id' => $aset->id])) !!}
</div>
@endsection