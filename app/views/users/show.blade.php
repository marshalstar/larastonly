<h1>Usuário {{ $user->username }}</h1>
<h3>id: {{ $user->id }}</h3>
<h3>nome usuário: {{ $user->username }}</h3>
<h3>email: {{ $user->email }}</h3>
<h3>especialidade: {{ $user->speciality }}</h3>
<h3>é administrador? {{ $user->is_admin? 'sim' : 'não' }}</h3>
<h3>sexo: {{ $user->gender }}</h3>
<h3>biografia: {{ $user->biography }}</h3>
<h3>url imagem: {{ $user->picture_url }}</h3>