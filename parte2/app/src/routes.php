<?php
// Routes
$app->get('/empleados', function ($request, $response, $args) {
	require_once 'entity/Empleado.php';
	$emailSearch = $request->getQueryParam('email','');
	$empleado = new App\Entity\EntityEmpleado();
	$lista=$empleado->getList($emailSearch);
	return $this->view->render($response, 'empleados.phtml', [
		'listaEmpelados'=>$lista,
		'emailSearch'=>$emailSearch
			]);
})->setName('empleados');

$app->get('/empleado/detalle/{id}', function ($request, $response, $args) {
	require_once 'entity/Empleado.php';
	$empleado = new App\Entity\EntityEmpleado();
	$route = $request->getAttribute('route');
	$data=$empleado->identify($route->getArgument('id'));
	$skills = $data->skills;
	$skillArray ='';
	foreach($skills as $index){
		$skillArray[] = $index->skill;
	}
	$skillArray = array_unique($skillArray);
	$skillString = implode(',', $skillArray);
	return $this->view->render($response, 'empleados-detalle.phtml', [
		'data'=>$data,
		'skillString'=>$skillString,
			]);
})->setName('empleados');

$app->get('/', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");
	
    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

$app->get('/service', function ($request, $response, $args) {
    // Sample log message
	require_once 'entity/Empleado.php';
	
	
    $this->logger->info("Slim-Skeleton '/' route");
	$empleado = new App\Entity\EntityEmpleado();
	$salarioMinimo = $request->getQueryParam('min','');
	$salarioMaximo = $request->getQueryParam('max','');
	$lista=$empleado->getListXml($salarioMinimo,$salarioMaximo);
	 header("Content-type: text/xml");
	//$request->getParsedBody('xml');
	echo ($lista);
	
    
		
});



