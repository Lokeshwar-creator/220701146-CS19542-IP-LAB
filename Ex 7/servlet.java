// This servlet retrieves the student registration number from the AJAX request.
It establishes a connection to a MySQL database using JDBC and checks if the registration number already exists.
A response is sent back to the frontend based on whether the registration number is available or taken. //

PROGRAM:
import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet("/validateRegNoServlet")
public class ValidateRegNoServlet extends HttpServlet {
    private static final long serialVersionUID = 1L;

    protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        String regNo = request.getParameter("regNo");
        response.setContentType("text/plain");
        PrintWriter out = response.getWriter();

        try {
            // JDBC connection
            Class.forName("com.mysql.cj.jdbc.Driver");
            Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/studentdb", "root", "password");

            // Query to check registration number
            String query = "SELECT * FROM students WHERE regno = ?";
            PreparedStatement ps = con.prepareStatement(query);
            ps.setString(1, regNo);
            ResultSet rs = ps.executeQuery();

            // If regno exists
            if (rs.next()) {
                out.write("Registration number is already taken");
            } else {
                out.write("Registration number is available");
            }

            con.close();
        } catch (Exception e) {
            e.printStackTrace();
            out.write("Error validating registration number");
        }
    }
}
