<?php
declare(strict_types=1);

namespace Plaisio\Page;

use Plaisio\Response\Response;

/**
 * Interface for pages.
 */
interface Page
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Page constructors don't have arguments.
   */
  public function __construct();

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * This method will be called before method handleRequest() is been called. Any additional and/or page specific
   * authorization and/or security checks can be implemented in this method.
   *
   * When a HTTP request must be denied a NotAuthorizedException must be raised.
   *
   * @return void
   *
   * @api
   * @since 1.0.0
   */
  public function checkAuthorization(): void;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Handles the HTTP request and returns a Response object.
   *
   * @return Response
   *
   * @api
   * @since 1.0.0
   */
  public function handleRequest(): Response;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * If this page can be requested via multiple URI's and one URI is preferred this method must return the preferred URI
   * of this page.
   *
   * Typically this method will be used when the URL contains some ID and an additional title.
   * Example:
   * Initially a page with an article about a book is created with title "Harry Potter and the Sorcerer's Stone" and the
   * URI is /book/123456/Harry-Potter-and-the-Sorcerer's-Stone.html. After this article has been edited the URI is
   * /book/123456/Harry-Potter-and-the-Philosopher's-Stone.html. The later URI is the preferred URI now.
   *
   * If the preferred URI is set and different from the requested URI the user agent will be redirected to the
   * preferred URI with HTTP status code 301 (Moved Permanently).
   *
   * @return string|null The preferred URI of this page.
   *
   * @api
   * @since 1.0.0
   */
  public function getPreferredUri(): ?string;

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
