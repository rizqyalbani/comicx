<html>
    <style>
        @media print, screen{
            body {
                background: url('/tiket_new.png');
                background-size: cover;
                background-repeat: no-repeat;
                font-family: Arial;
            }
            .row {
                padding: 43px 0 0 97px;
            }

            .col-3 {
                display: inline-block;
                float: left;
                /* background: rgba(0,0,0,0.2); */
                width: 285px;
                height: 210px;
                margin: 0 26px 28px 0;
            }

            .number {
                padding: 19px 0 0 65px;
            }

            .identity {
                padding: 66px 0 0 115px;
                font-size: 12px;
                line-height: 18px;
            }
            
            .identity {
                font-size:10.5px;
            }
        }
        
    </style>
    <body>
        <div class="row">
          
            @foreach ($models as $i => $item)
            <div class="col-3">
                <div class="number">@if($start < 10) 00{{$start}} @elseif($start < 100) 0{{$start}} @else {{$start}} @endif</div> <br>
                
                <div class="identity">
                    <div class="d-block name">@if($item->team_name != NULL) {{$item->team_name}} @else {{$item->competitorDetail->first() ? $item->competitorDetail->first()->name : '-'}}@endif</div> 
                    <div class="d-block from">{{$item->competitorDetail->first() ? $item->competitorDetail->first()->from : '-'}}</div>
                    <div class="d-block froms">{{$item->competitionCategory->name()}}</div>
                    <div class="d-block level">{{$item->competitionCategory->competitionLevel->name}}</div> 
                    {{-- <p>{{$item->invoice->approved_time}}</p> --}}
                </div>
            </div>
            <?php $start++; ?>
            @endforeach
            
        </div>
        
    </body>
</html>
