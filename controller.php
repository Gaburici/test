use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
/**
* @Route("/", name="homepage")
*/
public function index()
{
// codul care va trata solicitarea
}
}

use Psr\Log\LoggerInterface;


public function myAction(LoggerInterface $logger)
{

$user = 'Gaburici Ion';
$logger->info('User {user} are acess la pagina', ['user' => $user]);
}

use App\Form\UserFormType;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
* @Route("/register")
*/
public function register(Request $request)
{
$user = new User();
$form = $this->createForm(UserFormType::class, $user);

$form->handleRequest($request);
if ($form->isSubmitted() && $form->isValid()) {
$entityManager = $this->getDoctrine()->getManager();
$entityManager->persist($user);
$entityManager->flush();

return $this->redirectToRoute('app_home');
}

return $this->render('register.html.twig', [
'form' => $form->createView(),
]);
}