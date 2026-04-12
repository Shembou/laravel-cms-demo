<?php

namespace App\Enums;

enum Colors: string
{
    //Base Color Pallete
    case Primary = '#8b667a';
    case Secondary = '#674b79';
    case Teritary = '#f59e3e';

    // Background Colors - Dark Mode
    case BgPrimaryDark = '#0A0A0F';
    case BgSecondaryDark = '#12121C';
    case BgTertiaryDark = '#0D0D14';

    // Background Colors - Light Mode
    case BgPrimaryLight = '#FFFFFF';
    case BgSecondaryLight = '#F9FAFB';
    case BgTertiaryLight = '#F3F4F6';

    // Text Colors - Dark Mode
    case TextPrimaryDark = '#E2E2F0';
    case TextSecondaryDark = '#C4C4E0';
    case TextMutedDark = '#8B8BA0';

    // Text Colors - Light Mode
    case TextPrimaryLight = '#1F2937';
    case TextSecondaryLight = '#6B7280';
    case TextMutedLight = '#9CA3AF';

    // Border Colors
    case BorderDark = '#2A2350';
    case BorderLight = '#E5E7EB';

    // Accent Colors
    case AccentDark = '#A78BFA';
    case AccentLight = '#8B5CF6';

    /**
     * Get all colors as associative array for form select
     */
    public static function getSelectOptions(): array
    {
        $colors = [];
        foreach (self::cases() as $case) {
            $label = self::getLabelForCase($case->name);
            $colors[$case->value] = $label;
        }
        return $colors;
    }

    /**
     * Get colors formatted for RichEditor (name => hex)
     */
    public static function getForRichEditor(): array
    {
        $colors = [];
        foreach (self::cases() as $case) {
            $colors[$case->name] = $case->value;
        }
        return $colors;
    }

    /**
     * Convert enum case name to readable label
     */
    private static function getLabelForCase(string $caseName): string
    {
        return str_replace('_', ' ', $caseName);
    }
}