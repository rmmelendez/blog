        {!! csrf_field() !!}

        @if (auth()->guest())

        	<p><label for="nombre">
        		Nombre
        		<input class="form-control" type="text" name="nombre" value={{ old('nombre') }}>
        		{!! $errors->first('nombre', '<span class=error>:message</span>') !!}
        	</label></p>
        	<p><label for="email">
        		Email
        		<input class="form-control" type="email" name="email" value={{ old('email') }}>
        		{!! $errors->first('email','<span class=error>:message</span>') !!}
    		</label></p>
        @endif

    		<p><label for="telefono">
        		Telefono
        		<input class="form-control" type="text" name="telefono" value={{ old('telefono') }}>
        		{!! $errors->first('telefono','<span class=error>:message</span>') !!}
        	</label></p>
    	<p><label for="mensaje">
    		Mensaje
    		<textarea class="form-control" name="mensaje">{{ old('mensaje') }}</textarea>
    		{!! $errors->first('mensaje', '<span class=error>:message</span>') !!}
    	</label></p>
    	<input class="btn btn-primary" type="submit" value="Enviar">