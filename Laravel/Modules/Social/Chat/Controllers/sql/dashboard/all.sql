 SELECT 
                chats.*,
                subjects.*,
                messages.*,
                COALESCE(messages_counts.messages_count, 0) AS messages_count,
                COALESCE(reactions_counts.reactions_count, 0) AS reactions_count,
                COALESCE(messages_counts.messages_count, 0) + COALESCE(reactions_counts.reactions_count, 0) AS messages_and_reactions_count
            FROM 
                chats
                LEFT JOIN subjects ON chats.id = subjects.chat_id
                LEFT JOIN messages ON subjects.id = messages.subject_id
                LEFT JOIN message_user ON users.id = messages.user_id
                LEFT JOIN subject_user ON users.id = subject.user_id
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
            ORDER BY 
                chats.id, 
                subjects.id, 
                messages.id