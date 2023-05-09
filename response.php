use Symfony\Component\HttpFoundation\Response;

// ...

public function myAction()
{
// ...
$response = new Response();
}


public function myAction()
{
// ...
$html = $this->render('my_template.html.twig', [
'variable' => $value,
]);

$response = new Response($html);
return $response;
}