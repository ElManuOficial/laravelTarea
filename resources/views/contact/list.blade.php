
    @if(session()->get("msj")!="")
      <div class="alert {{session()->get("error")?'alert-danger':'alert-success'}}" role="alert">
          {{session()->get("msj")}}
      </div>
    @endif
    <a href="{{url('contacts/create')}}" class="btn btn-primary">Crear</a>
    <div class="row justify-content-center">
       <div class="col-12">
       <table class="table">
         <thead class="thead-dark">
            <tr>
               <th scope="col">#</th>
               <th scope="col">Name</th>
               <th scope="col">Phone</th>
               <th scope="col">Actions</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($contacts as $contact)
            <tr>
               <th scope="row">
                @if(!empty($contact->image))
                  <!-- <img style="border-radius:50%;width:100px;height:100px" src="{{'/contacts/'.$contact->image}}" alt="" > -->
                  <img style="border-radius:50%;width:100px;height:100px" src="{{ asset('/contacts/'.$contact->image) }}" alt="" >   
                @endif
               </th>
               <td class="align-middle">{{$contact->name}}</td>
               <td class="align-middle">{{$contact->phone}}</td>
               <td class="align-middle">
               <form action="{{route('delete', $contact->id)}}" method="POST">
                    <a href="{{url('contacts/update/'.$contact->id)}}" class="btn btn-success btn-sm">Modificar</a>
                  
                    
                    <input type="submit" class="btn btn-danger btn-sm" value="Eliminar"/>
                    <input type="hidden" name="_method" value="delete"/>
                    @csrf

                  </form>
               </td>
            </tr>
            @endforeach
         </tbody>
         </table>
        </div>
    </div>
