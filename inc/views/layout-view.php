<?= stringCommands(TEMPLATE[CONFIG["page_template"] ?? ""]["layout"] ?? "", array_merge(commandsTemplateUserComponents(TEMPLATE[CONFIG["page_template"] ?? ""]["components"] ?? []), postToCommands(POST ?? []), commands(
  config: CONFIG,
  core: CORE,
  slug: SLUG,
  url: URL,
  url_not_index: URL_NOT_INDEX,
  theme: getTheme(CONFIG["page_theme"] ?? ""),
  dir: DIR,
  auth: auth(),
  post: $post ?? [],
  viewAdsMessajeAndBanner: $viewAdsMessajeAndBanner ?? "",
  viewAdsThumbnail: viewAdsThumbnail(CONFIG["ads"] ?? [], DIR),
  viewAlertMessage: view("components/alert"),
  viewsRequire: $viewsRequire ?? "",
  is_admin: isAdmin(),
  php_extension: PHP_EXTENSION,
  get_styles: $get_styles ?? ""
))) ?>