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

                <hr>


                <div class="row mb-2">

                    <div class="col-md-12 mt-4 mb-4">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif



                        <form class="row gy-2 gx-3 align-items-center" method="GET"
                            action="{{ route('articles.search') }}">
                            <div class="col-auto">
                                <label class="visually-hidden" for="autoSizingInput">Keyword</label>
                                <input type="text" class="form-control" name="keyword" placeholder="Keyword">
                            </div>
                            <div class="col-auto">
                                <label class="visually-hidden" for="autoSizingInputGroup">Username</label>
                                <input type="date" class="form-control" name="date" placeholder="date">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>
                    </div>




                    @foreach ($data as $key => $d)
                        <div class="col-md-6">
                            <div
                                class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                <div class="col p-4 d-flex flex-column position-static">
                                    <strong class="d-inline-block mb-2 text-primary">{{ $d->source }}</strong>
                                    <h3 class="mb-0">
                                        @if ($d->title != '') {{ substr($d->title, 0, 20) }}
                                        @else &nbsp; @endif
                                    </h3>
                                    <div class="mb-1 text-muted">
                                        @if ($d->publishedAt != '')
                                        {{ date('Y/m/d h:mA', strtotime($d->publishedAt)) }} @else &nbsp; @endif
                                    </div>
                                    <p class="card-text mb-auto">
                                        @if ($d->description != '')
                                        {{ substr($d->description, 0, 100) }} @else &nbsp; @endif
                                    </p>
                                    <div class="mb-1 text-muted"><i>
                                            @if ($d->author != '') by
                                            {{ substr($d->author, 0, 20) }} @else &nbsp; @endif
                                        </i></div>
                                    <a target="_blank" class="btn btn-primary" href="{{ $d->url }}"> Continue
                                        reading</a>
                                </div>
                                <div class="col-auto d-none d-lg-block">
                                    @if ($d->image != '')
                                        <img src="{{ $d->image }}" class="img-fluid" width="200" height="250" alt="">
                                    @else
                                        <svg class="bd-placeholder-img" width="200" height="250"
                                            xmlns="http://www.w3.org/2000/svg" role="img"
                                            aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"
                                            focusable="false">
                                            <title>Placeholder</title>
                                            <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%"
                                                fill="#eceeef" dy=".3em">Thumbnail</text>
                                        </svg>
                                    @endif;
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="d-flex">
                        {!! $data->links() !!}
                    </div>



                </div>
            </div>
        @endsection
