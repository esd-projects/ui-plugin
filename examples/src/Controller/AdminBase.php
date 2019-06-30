<?php
/**
 * File: admin.php
 * User: 4213509@qq.com
 * Date: 2019-06-29
 * Time: ${Time}
 **/

namespace ESD\Examples\Controller;

use ESD\Go\Exception\AlertResponseException;
use ESD\Go\Exception\ResponseException;
use ESD\Go\GoController;
use ESD\Plugins\AnnotationsScan\Annotation\Component;
use ESD\Plugins\EasyRoute\RouteException;
use ESD\Plugins\Security\AccessDeniedException;

/**
 * @Component()
 * @package ESD\Plugins\EsdUI\examples\Controller
 */
class AdminBase extends GoController
{
    public function onExceptionHandle(\Throwable $e)
    {
        if ($this->clientData->getResponse() != null) {
            $this->response->withStatus(404);
            $this->response->withHeader("Content-Type", "text/html;charset=UTF-8");
            if ($e instanceof RouteException) {
                $msg = '404 Not found / ' . $e->getMessage();
                return $msg;
            } elseif ($e instanceof AccessDeniedException) {
                $this->response->withStatus(401);
                $msg = '401 Access denied / ' . $e->getMessage();
                return $msg;
            } elseif ($e instanceof ResponseException) {
                $this->response->withStatus(200);
                return $this->errorResponse($e->getMessage(), $e->getCode());
            } elseif ($e instanceof AlertResponseException) {
                $this->response->withStatus(500);
                return $this->errorResponse($e->getMessage(), $e->getCode());
            }
        }
        return parent::onExceptionHandle($e);
    }

}
