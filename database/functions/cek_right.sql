DELIMITER |

CREATE FUNCTION cek_right(param_action VARCHAR(20)  , param_menu_id INT , param_role_id INT)
RETURNS VARCHAR(20)

BEGIN
	DECLARE into_action INT;
	DECLARE var_action VARCHAR(20);
	DECLARE into_menu_action_id INT;
	DECLARE into_right_id INT;

	SELECT id INTO into_action FROM actions WHERE action = param_action LIMIT 1;

	IF(into_action <> '') THEN

		SELECT id INTO into_menu_action_id FROM menu_actions WHERE action_id = into_action  AND menu_id = param_menu_id LIMIT 1;

		IF(into_menu_action_id <> '') THEN
			
			SELECT id INTO into_right_id FROM rights WHERE role_id = param_role_id AND menu_action_id = into_menu_action_id LIMIT 1;

			IF(into_right_id <> '') THEN

			SET var_action = 'true';
			
			ELSE
				SET var_action = 'false';
			
			END IF;
			
		ELSE
			SET var_action = 'go';
			

		END IF;

			
	ELSE
		SET var_action = 'go';
		
	END IF;

	RETURN var_action;
END
|
DELIMITER;