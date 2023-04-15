    /*SELECT 
        themes.*,
        subjects.*,
        messages.*,
        COALESCE(messages_counts.messages_count, 0) AS messages_count,
        COALESCE(reactions_counts.reactions_count, 0) AS reactions_count,
        COALESCE(messages_counts.messages_count, 0) + COALESCE(reactions_counts.reactions_count, 0) AS messages_and_reactions_count
    FROM 
        themes
        LEFT JOIN subjects ON themes.id = subjects.theme_id
        LEFT JOIN messages ON subjects.id = messages.subject_id
        LEFT JOIN (
            SELECT 
                subject_id, 
                COUNT(*) AS messages_count 
            FROM 
                messages 
            GROUP BY 
                subject_id
        ) AS messages_counts ON subjects.id = messages_counts.subject_id
        LEFT JOIN (
            SELECT 
                message_id, 
                COUNT(*) AS reactions_count 
            FROM 
                reactions 
            GROUP BY 
                message_id
        ) AS reactions_counts ON messages.id = reactions_counts.message_id
    WHERE 
        messages.created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY)
    ORDER BY 
        messages_and_reactions_count DESC
    LIMIT 3*/
    SELECT s.id, s.title, JSON_EXTRACT(JSON_ARRAYAGG(m.message), "$") as messages
    FROM subjects s
    JOIN messages m ON s.id = m.subject_id
    GROUP BY s.id, s.title