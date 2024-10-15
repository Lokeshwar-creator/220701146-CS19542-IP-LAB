import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet("/RegisterServlet")
public class RegisterServlet extends HttpServlet {
    private static final long serialVersionUID = 1L;

    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        // Set response content type
        response.setContentType("text/html");
        
        // Get the data from the form
        String studentName = request.getParameter("student_name");
        String rollNo = request.getParameter("rollno");
        String gender = request.getParameter("gender");
        String year = request.getParameter("year");
        String department = request.getParameter("department");
        String section = request.getParameter("section");
        String mobileNo = request.getParameter("mobile_no");
        String emailId = request.getParameter("email_id");
        String address = request.getParameter("address");
        String city = request.getParameter("city");
        String country = request.getParameter("country");
        String pincode = request.getParameter("pincode");

        // Display the data with proper labels
        PrintWriter out = response.getWriter();
        out.println("<html><body>");
        out.println("<h2>Registration Details</h2>");
        out.println("<p><strong>Student Name:</strong> " + studentName + "</p>");
        out.println("<p><strong>Roll Number:</strong> " + rollNo + "</p>");
        out.println("<p><strong>Gender:</strong> " + gender + "</p>");
        out.println("<p><strong>Year:</strong> " + year + "</p>");
        out.println("<p><strong>Department:</strong> " + department + "</p>");
        out.println("<p><strong>Section:</strong> " + section + "</p>");
        out.println("<p><strong>Mobile Number:</strong> " + mobileNo + "</p>");
        out.println("<p><strong>Email ID:</strong> " + emailId + "</p>");
        out.println("<p><strong>Address:</strong> " + address + "</p>");
        out.println("<p><strong>City:</strong> " + city + "</p>");
        out.println("<p><strong>Country:</strong> " + country + "</p>");
        out.println("<p><strong>Pincode:</strong> " + pincode + "</p>");
        out.println("</body></html>");
    }
}
