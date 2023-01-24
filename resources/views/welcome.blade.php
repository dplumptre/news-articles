@extends('layouts.app_welcome')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">


<div class="mt-3">
    <h1 style="color: #003399">News Article</h1>
    <h2 style="color:#ff6600">CapitalSage Technology Limited</h2>
    <h6 class="text-secondary">News updates every 6 hours</h6>
</div>




            <div class="card mt-3">
                <div class="card-header">{{ __('News Articles') }}</div>
                <div class="card-body">



                    
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Source</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>image</th>
                                <th>Published date</th>
                                <th style="width:10%">Author</th>
                                <th style="width:10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key => $d)
                            <tr>
                                <td>{{ $d->created_at->format('Y-M-d H:i')}}</td>
                                <td class="text-secondary font-weight-bold"><strong>{{ $d->source}}</strong></td>
                                <td>{{ substr($d->title,0,20)}}</td>
                                <td>{{ substr($d->description,0,30)}}</td>
                                <td>{{ $d->source}}</td>
                                <td>{{ $d->publishedAt}}</td>
                                <td>{{ substr($d->author,0,20)}}</td>
                                <td><a target="_blank" class="btn btn-primary" href="{{ $d->url}}"> view</a></td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                        
                    </table>
                



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
