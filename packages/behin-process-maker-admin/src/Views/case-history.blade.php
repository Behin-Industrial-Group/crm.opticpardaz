{{-- @extends(config('pm_config.layout_name')) --}}

{{-- @section('content') --}}
    <div class="table-responsive">
        <table class="table" id="list">
            <thead>
                <tr>
                    <th>{{__('del_index')}}</th>
                    <th>{{__('tas_type')}}</th>
                    <th>{{__('del_init_date')}}</th>
                    <th>{{__('tas_title')}}</th>
                    <th>{{__('status')}}</th>
                    <th>{{__('del_finish_date')}}</th>
                    <th>{{__('usr_firstname')}}</th>
                    <th>{{__('usr_lastname')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                @php
                    if($item[0]['status'] == 'TASK_IN_PROGRESS'){
                        $color = 'red';
                    }else{
                        $color = 'green';
                    }
                @endphp
                    <tr style="background: {{$color}}">
                        <td>{{$item[0]['del_index']}}</td>
                        <td>{{$item[0]['tas_type']}}</td>
                        <td>
                            @if ($item[0]['tas_type'] == 'SCRIPT-TASK')
                                {{$item[0]['del_finish_date']}}
                            @else
                                {{$item[0]['del_init_date']}}
                            @endif
                        </td>
                        <td>{{$item[0]['tas_title']}}</td>
                        <td>{{$item[0]['status']}}</td>
                        <td>{{$item[0]['del_finish_date']}}</td>
                        <td>{{$item[0]['usr_firstname']}}</td>
                        <td>{{$item[0]['usr_lastname']}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>