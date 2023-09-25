
  
  <!-- BREADCRUMB AREA START -->
  @unless ($breadcrumbs->isEmpty())
      <div class="ltn__breadcrumb-area ltn__breadcrumb-area-4 bg-overlay-theme-10--- bg-image" data-bg="img/bg/4.png">
          <div class="container">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-4 justify-content-between">
                          <div class="section-title-area">
                              <h1 class="section-title white-color">{{$breadcrumbs->last()->title}}</h1>
                          </div>
                          <div class="ltn__breadcrumb-list">
                              <ul>
                                  @foreach ($breadcrumbs as $breadcrumb)
                                      @if ($breadcrumb->url && !$loop->last)
                                          <li><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
                                      @else
                                          <li>{{$breadcrumb->title}}</li>
                                      @endif
                                  @endforeach
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  @endunless
  <!-- BREADCRUMB AREA END -->
