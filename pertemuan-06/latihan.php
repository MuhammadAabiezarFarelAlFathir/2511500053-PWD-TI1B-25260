switch ($grade2):
                case "A": $status2 = "LULUS"; break;
                case "A-": $status2 = "LULUS"; break;
                case "B+": $status2 = "LULUS"; break;
                case "B": $status2 = "LULUS"; break;
                case "B-": $status2 = "LULUS"; break;
                case "C+": $status2 = "LULUS"; break;
                case "C": $status2 = "LULUS"; break;
                case "C-": $status2 = "LULUS"; break;
                case "D":
                case "E":
                    $status2 = "GAGAL";
                    break;
            endswitch;