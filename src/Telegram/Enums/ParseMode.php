<?php

namespace DevDasher\TelePHP\Telegram\Enums;

enum ParseMode: string
{
    case HTML = 'HTML';
    case MARKDOWN = 'Markdown';
    case MARKDOWN_V2 = 'MarkdownV2';
}